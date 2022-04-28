@extends('admin.layout.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="card-box mb-30">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-blue h4">Rate Detail</h4>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <h5 class="card-title">ID:<code style="font-size: 20px"> {{ $rate->id }}</code>
                                </h5>
                                <p class="card-text">Name:<code style="font-size: 15px"> {{ $rate->username }}</code>
                                </p>
                                <p class="card-text">Product name:<code style="font-size: 15px"> {{ $rate->products->name }}</code>
                                </p>
                                <p class="card-text">Rate:<code style="font-size: 15px"> {{ $rate->rate }}</code>
                                </p>
                                
                                <p class="card-text">Created_at:<code style="font-size: 15px">
                                        {{ $rate->created_at }}</code></p>
                                <p class="card-text">Updated_at:<code style="font-size: 15px">
                                        {{ $rate->updated_at }}</code></p>
                            </div>
                            <div class="clearfix">
                                <div class="pull-right">
                                    <a href="{{ route('admin.rate.list') }}" class="btn btn-dark">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
