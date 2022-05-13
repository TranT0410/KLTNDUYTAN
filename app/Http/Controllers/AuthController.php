<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\ForgetRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class AuthController extends Controller
{
    public function login()
    {
        return view('admin.auth.login');
    }

    public function register()
    {
        return view('admin.auth.register');
    }

    public function checkLogin(LoginRequest $request)
    {
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ])) {
            if (Auth::user()->role != config('constants.role_customer')) {
                return redirect()->route('admin.index');
            } else {
                return redirect()->route('home');
            }
        } else {
            return back()->with('message', 'Email hoặc mật khẩu không đúng!');
        }
    }
    public function handleLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function handleRegister(UserRequest $request)
    {
        $data = $request->all();
        $email = $request->email;
        $code = substr(md5(rand()), 0, 4);
        $titleEmail = 'Xác thực email';
        $sender = 'Trang Sức Việt';
        $data['email'] = $email;
        $data['password'] = Hash::make($request->password);

        session()->put('email', [
            'code' => $code,
            'name' => $data['name'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'email' => $email,
            'password' => $data['password'],
            'role' => $request->role,
        ]);
        Mail::send('front.account.mail', $data, function ($message) use ($titleEmail, $sender, $data) {
            $message->to($data['email'])->subject($titleEmail);
            $message->from($data['email'], $sender);
        });
        return redirect(route('admin.confirm.email'));
    }

    public function confirmEmail()
    {
        return view('front.account.confirm');
    }

    public function confirmPost(Request $request)
    {
        $data = $request->all();
        $dataUser = session('email');
        if ($data['confirmEmail'] === $dataUser['code']) {
            User::create([
                'name' => $dataUser['name'],
                'email' => $dataUser['email'],
                'email_verified_at' => Carbon::now(),
                'password' => $dataUser['password'],
                'phone' => $dataUser['phone'],
                'address' => $dataUser['address'],
                'role' => $dataUser['role'],
            ]);
            return redirect(route('admin.user.login'))->with('status', 'Đăng Ký Thành Công');
        } else {
            return back()->with('status', 'Mã xác nhận chưa nhập hoặc không chính xác');
        }
    }

    public function viewPassword()
    {
        return view('front.account.password');
    }

    public function changePassword(PasswordRequest $request)
    {
        $data = $request->all();
        $email = auth()->user()->email;
        $passUser = User::where('email', $email)->first();
        if (Hash::check($data['password'], $passUser['password'])) {
            $passUser['password'] = Hash::make($request->passwordNew);
            $passUser->update();
            return back()->with('status', 'Đã đổi mật khẩu thành công');
        } else {
            return back()->with('status', 'Xác nhận mật khẩu không chính xác');
        }
    }
    public function viewForget()
    {
        return view('front.account.forget');
    }

    public function forgetPassword(ForgetRequest $request)
    {
        $data = $request->all();
        $email = $request->email;
        $code = substr(md5(rand()), 0, 6);
        $titleEmail = 'Xác thực email';
        $sender = 'Trang Sức Việt';
        $data['email'] = $email;

        session()->put('email', [
            'code' => $code,
            'email' => $email,
            'password' => $data['passwordNew'],
        ]);
        Mail::send('front.account.mail', $data, function ($message) use ($titleEmail, $sender, $data) {
            $message->to($data['email'])->subject($titleEmail);
            $message->from($data['email'], $sender);
        });
        return redirect(route('admin.confirm.emailForget'));
    }

    public function viewConfirm()
    {
        return view('front.account.confirmForget');
    }
    public function confirmForget(Request $request)
    {
        $data = $request->all();
        $dataUser = session('email');
        if ($data['confirmEmail'] === $dataUser['code']) {
            $check = User::where('email', $dataUser['email'])->first();
            if ($check != null) {
                $check['password'] = Hash::make($dataUser['password']);
                $check->update();
            }
            return redirect(route('admin.user.login'))->with('status', 'Thay Đổi Mật Khẩu Thành Công');
        } else {
            return back()->with('status', 'Mã xác nhận chưa nhập hoặc không chính xác');
        }
    }
}