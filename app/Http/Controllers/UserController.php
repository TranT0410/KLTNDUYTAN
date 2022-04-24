<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(config('constants.paginate_10'));

        return view('admin.user.list', compact('users'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(UserRequest $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make('password');
        User::create($data);

        return redirect(route('admin.user.list'))->with('status', 'Insert user successfully');
    }

    public function view($id)
    {
        $user = User::find($id);

        return view('admin.user.view', compact('user'));
    }

    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        return view('admin.user.update', compact('user'));
    }
}