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
                        <h4 class="text-blue h4">Danh Sách Khuyến Mãi</h4>
                    </div>
                    <div class="clearfix pd-30">
                        <div class="pull-left">
                            <a href="{{route('supplier.promotion.create')}}" class="btn btn-success">Thêm Mới</a>
                        </div>
                    </div>
                    <div class="pb-20">
                        <table class="table stripe hover">
                            <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Khuyến Mãi</th>
                                <th>Ngày Bắt Đầu</th>
                                <th>Ngày Kết Thúc</th>
                                <th>Trạng Thái</th>
                                <th>Ngày Tạo</th>
                                <th class="datatable-nosort">Thao Tác</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($promotion as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{$row->date_start}}</td>
                                    <td>{{$row->date_end}}</td>
                                    <td>{{$date < $row->date_end ? 'Còn Khuyến Mãi' : 'Khuyến Mãi Đã Hết'}}</td>
                                    <td>{{$row->created_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                   href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                  <a class="dropdown-item" href="{{route('supplier.promotion.view',$row->id)}}
                                                    "><i
                                                class="dw dw-eye"></i>
                                            Xem Chi Tiết</a>
                                            <a class="dropdown-item" href="{{route('supplier.promotion.add_product',$row->id)}}
                                                "><i
                                            class="dw dw-eye"></i>
                                            Thêm Sản Phẩm</a>
                                            
                                                  <a class="dropdown-item"
                                                       href="{{route('supplier.promotion.edit',$row->id)}}"><i
                                                            class="dw dw-edit2"></i>Chỉnh Sửa</a>
                                                        <a class="dropdown-item"
                                                           href="{{route('supplier.promotion.delete',$row->id)}}"><i
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
                                {{ $promotion->links() }}
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
