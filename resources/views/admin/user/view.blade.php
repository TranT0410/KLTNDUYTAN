@extends('admin.layout.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="card-box mb-30">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-blue h4">User Detail</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <h5 class="card-title">ID: <code style="font-size: 20px">{{ $user->id }}</code></h5>
                                <p class="card-text">Name: <code style="font-size: 15px">{{ $user->name }}</code></p>
                                <p class="card-text">Email: <code style="font-size: 15px">{{ $user->email }}</code></p>
                                <p class="card-text">Address: <code style="font-size: 15px">{{ $user->address }}</code>
                                </p>
                                <p class="card-text">Phone: <code style="font-size: 15px">{{ $user->phone }}</code></p>
                                <p class="card-text">Role: <code
                                        style="font-size: 15px">{{ $user->role === config('constants.admin') ? 'Admin' : 'User' }}</code>
                                </p>
                                <p class="card-text">Created at: <code
                                        style="font-size: 15px">{{ $user->created_at }}</code></p>
                                <p class="card-text">Updated at: <code
                                        style="font-size: 15px">{{ $user->updated_at }}</code></p>
                            </div>
                            <div class="clearfix">
                                <div class="pull-right">
                                    <a href="{{ route('admin.user.list') }}" class="btn btn-dark">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
