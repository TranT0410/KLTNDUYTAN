<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $data['password'] = Hash::make($request->password);
        User::create($data);

        return redirect(route('admin.user.login'))->with('Đăng kí tài khoản thành công');
    }
}