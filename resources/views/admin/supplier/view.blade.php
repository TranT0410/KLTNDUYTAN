@extends('admin.layout.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="card-box mb-30">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-blue h4">Supplier Detail</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <h5 class="card-title">ID:<code style="font-size: 20px"> {{ $supplier->id }}</code>
                                </h5>
                                <p class="card-text">Name:<code style="font-size: 15px"> {{ $supplier->name }}</code>
                                </p>
                                <p class="card-text">Address:<code style="font-size: 15px"> {{ $supplier->address}}</code>
                                </p>
                                <p class="card-text">Phone:<code style="font-size: 15px"> {{ $supplier->phone }}</code>
                                </p>
                                <p class="card-text">User Name:<code style="font-size: 15px"> {{ $supplier->users->name }}</code>
                                </p>
                                <p class="card-text">Created_at:<code style="font-size: 15px">
                                        {{ $supplier->created_at }}</code></p>
                                <p class="card-text">Updated_at:<code style="font-size: 15px">
                                        {{ $supplier->updated_at }}</code></p>
                            </div>
                            <div class="clearfix">
                                <div class="pull-right">
                                    <a href="{{ route('admin.supplier.list') }}" class="btn btn-dark">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection