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
                        <h4 class="text-blue h4">Product List</h4>
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
                                <th>Quantity</th>
                                <th>Image</th>
                                <th>Price</th>
                                <th>Category</th>
                                <th>Create at</th>
                                <th class="datatable-nosort">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($products as $row)
                                <tr>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{$row->quantity}}</td>
                                    <td><img src="{{Storage::url($row->image)}}" width="200px" height="200px"></td>
                                    <td>{{$row->price}}</td>
                                    <td>{{$row->categories->name}}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                                <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle"
                                                   href="#" role="button" data-toggle="dropdown">
                                                    <i class="dw dw-more"></i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                                                    <a class="dropdown-item"
                                                       href="{{route('supplier.product.edit',$row->id)}}"><i
                                                            class="dw dw-edit2"></i> Edit</a>
                                                        <a class="dropdown-item"
                                                           href="{{route('supplier.product.delete',$row->id)}}"><i
                                                                class="dw dw-delete-3"></i>
                                                            Delete</a>
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
@endsection


