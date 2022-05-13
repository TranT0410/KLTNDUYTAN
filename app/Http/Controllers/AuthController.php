<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
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
            return back()->with('message', 'Email hoặc password không đúng!');
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
}