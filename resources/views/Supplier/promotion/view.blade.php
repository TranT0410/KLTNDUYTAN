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
                        <h4 class="text-blue h4">Chi Tiết Khuyến Mãi</h4>
                    </div>
                    <div class="clearfix pd-30">
                        <div class="pull-left">
                            <a href="{{route('supplier.promotion.add_product',$promotion[0]->promotion_id)}}" class="btn btn-success">Add</a>
                        </div>
                    </div>
                    <div class="clearfix pd-30">
                        <div class="pull-left">
                        </div>
                    </div>
                    <div class="pb-20">
                        <table class="table stripe hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tên Khuyến Mãi</th>
                                <th>Sản Phẩm</th>
                                <th>Phần Trăm</th>
                                <th>Mô Tả</th>
                                <th class="datatable-nosort">Thao Tác</th>
                            </tr>
                            </thead>
                            @foreach($promotion as $row)
                            <tbody>
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->promotions->name }}</td>
                                    <td>{{$row->products->name}}</td>
                                    <td>{{$row->rate}}%</td>
                                    <td>{{$row->description}}</td>
                                    <td>
                                        <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                   href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                  <a class="dropdown-item"
                                                       href="{{route('supplier.promotion.update_product',$row->id)}}"><i
                                                            class="dw dw-edit2"></i> Chỉnh Sửa</a>
                                                        <a class="dropdown-item"
                                                           href="{{route('supplier.promotion.delete_product',$row->id)}}"><i
                                                                class="dw dw-delete-3"></i>
                                                            Xóa</a>
                                                </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                            @endforeach
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
