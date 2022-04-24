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
                        <h4 class="text-blue h4">Promotion List</h4>
                    </div>
                    <div class="clearfix pd-30">
                        <div class="pull-left">
                        </div>
                    </div>
                    <div class="pb-20">
                        <table class="table stripe hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Date Start</th>
                                <th>Date End</th>
                                <th>Status</th>
                                <th>Create at</th>
                                <th class="datatable-nosort">Action</th>
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
                                            View</a>
                                            <a class="dropdown-item" href="{{route('supplier.promotion.add_product',$row->id)}}
                                                "><i
                                            class="dw dw-eye"></i>
                                            Add Product</a>
                                            
                                                  <a class="dropdown-item"
                                                       href="{{route('supplier.promotion.edit',$row->id)}}"><i
                                                            class="dw dw-edit2"></i> Edit</a>
                                                        <a class="dropdown-item"
                                                           href="{{route('supplier.promotion.delete',$row->id)}}"><i
                                                                class="dw dw-delete-3"></i>
                                                            Delete</a>
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
