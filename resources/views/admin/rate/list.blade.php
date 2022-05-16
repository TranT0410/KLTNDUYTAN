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
                        <h4 class="text-blue h4">Danh Sách Đánh Giá</h4>
                    </div>
                    <div class="pb-20">
                        <table class="table stripe hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Người Đánh Giá</th>
                                <th>Nội Dung</th>
                                <th>Sản Phẩm</th>
                                <th>Ngày Tạo</th>
                                <th class="datatable-nosort">Thao Tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($rates as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->username }}</td>
                                    <td>{{ $row->rate}}</td>
                                    <td>{{ $row->products->name }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                   href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item" href="{{route('admin.rate.view',$row->id)}}
                                                                "><i
                                                            class="dw dw-eye"></i>
                                                        Chi Tiết</a>
                                                        <a class="dropdown-item"
                                                           href="{{route('admin.rate.delete',$row->id)}}"><i
                                                                class="dw dw-delete-3"></i>
                                                            Xóa</a>
                                                    </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
@endpush
