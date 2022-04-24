@extends('admin.layout.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20">
            <div class="card-box pd-20 height-100-p mb-30">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img src="{{ asset('admin/vendors/images/banner-img.png') }}" alt="">
                    </div>
                    <div class="col-md-8">
                        <h4 class="font-20 weight-500 mb-10 text-capitalize">
                            Welcome
                            {{-- <div class="weight-600 font-30 text-blue">{{ auth()->user()->name }}</div> --}}
                        </h4>
                        <p class="font-18 max-width-600">This is the admin dashboard page</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
