<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        $profile = auth()->user();
        return view('front.account.profile', compact('profile'));
    }
}