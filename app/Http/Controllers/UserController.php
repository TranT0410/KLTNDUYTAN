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

        return redirect(route('admin.user.list'))->with('status', 'Thêm mới người dùng thành công!');
    }

    public function view($id)
    {
        $user = User::find($id);

        return view('admin.user.view', compact('user'));
    }

    public function update($id)
    {
        $user = User::find($id);
        return view('admin.user.update', compact('user'));
    }

    public function edit($id, Request $request)
    {
        $user = User::find($id);
        $data = $request->all();
        $user->update($data);
        return redirect(route('admin.user.list'))->with('status', 'Cập nhật người dùng thành công');
    }

    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('admin.user.list'))->with('status', 'Xóa người dùng thành công');
    }
}