@extends('admin.layout.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card-box mb-30">
                    <div class="pd-20">
                        <h4 class="text-blue h4">Danh Sách Nhà Cung Cấp</h4>
                    </div>
                    <div class="clearfix pd-30">
                        <div class="pull-left">
                            <a href="{{route('admin.supplier.create')}}" class="btn btn-success">Thêm Mới</a>
                        </div>
                    </div>
                    <div class="pb-20">
                        <table class="table stripe hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Nhà Cung Cấp</th>
                                <th>Địa Chỉ</th>
                                <th>Số Điện Thoại</th>
                                <th>Tài Khoản</th>
                                <th>Ngày Tạo</th>
                                <th class="datatable-nosort">Thao Tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($suppliers as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{$row->address}}</td>
                                    <td>{{$row->phone}}</td>
                                    <td>{{$row->users->name}}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                   href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="{{route('admin.supplier.view',$row->id)}}
                                                                "><i
                                                            class="dw dw-eye"></i>
                                                        Chi Tiết</a>
                                                    <a class="dropdown-item"
                                                       href="{{route('admin.supplier.edit',$row->id)}}"><i
                                                            class="dw dw-edit2"></i> Cập Nhật</a>
                                                        <a class="dropdown-item"
                                                           href="{{route('admin.supplier.delete',$row->id)}}"><i
                                                                class="dw dw-delete-3"></i>
                                                            Xóa</a>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="clearfix pd-30">
                            <div class="pull-left">
                                {{ $suppliers->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
@endpush
