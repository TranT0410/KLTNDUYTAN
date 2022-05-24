@extends('admin.layout.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Danh Sách Người Dùng</h4>
                    </div>
                    <div class="clearfix pd-30">
                        <div class="pull-left">
                            <a href="{{ route('admin.user.create') }}" class="btn btn-success">Thêm Mới</a>
                        </div>
                    </div>
                    <div class="pb-20">
                        <table class="table stripe hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Người Dùng</th>
                                <th>Email</th>
                                <th>Địa Chỉ</th>
                                <th>Số Điện Thoại</th>
                                <th>Quyền</th>
                                <th class="datatable-nosort">Thao Tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as  $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->address }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <?php if($user->role === config('constants.role_admin')){?>
                                                <td>Admin</td> 
                                       <?php    }else if($user->role === config('constants.role_supplier')){ ?>
                                                <td>Supplier</td>
                                    <?php }else{ ?>
                                                <td>User</td>
                                    <?php } ?>
                                    <td>
                                        <div class="dropdown">
                                            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                               href="#" role="button" data-toggle="dropdown">
                                                <i class="dw dw-more"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                <a class="dropdown-item"
                                                   href="{{ route('admin.user.show', $user->id) }}"><i
                                                        class="dw dw-eye"></i> Xem</a>
                                                <a class="dropdown-item"
                                                   href="{{ route('admin.user.edit', $user->id) }}"><i
                                                        class="dw dw-edit2"></i> Cập Nhật</a>
                                                @if($user->role != config('constants.role_admin'))
                                                <a class="dropdown-item"
                                                   href="{{ route('admin.user.delete', $user->id) }}"><i
                                                        class="dw dw-delete-3"></i> Xóa</a>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="clearfix pd-30">
                            <div class="pull-left">
                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
