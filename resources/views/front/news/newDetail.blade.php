@extends('front.layout.master')
@section('css')
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
<link href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" href="{{asset('plugins/themify-icons/themify-icons.css')}}">
<link rel="stylesheet" href="{{asset('css/animate.css')}}">
<link rel="stylesheet" href="{{asset('css/open-iconic-bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
<link rel="stylesheet" href="{{asset('css/aos.css')}}">
<link rel="stylesheet" href="{{asset('css/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('css/icomoon.css')}}">
<link rel="stylesheet" href="{{asset('css/ionicons.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection

@section('content')
<div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/bg_1.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">Blog</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-degree-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 ftco-animate">
                <h2 class="mb-3">{{$news->title}}</h2>
                <p>
                    <img src="{{Storage::url($news->image)}}" alt="" class="img-fluid" width="520px">
                </p>
                <p>{!!$news->content!!}</p>

            </div> <!-- .col-md-8 -->
            <div class="col-lg-4 sidebar ftco-animate">


                <div class="sidebar-box ftco-animate">
                    <h3 class="heading">Top 3 Blog Recently</h3>
                    @foreach($postRecently as $row)
                    <div class="block-21 mb-4 d-flex">
                        <a class="blog-img mr-4" style="background-image: url({{Storage::url($row->image)}});"></a>
                        <div class="text">
                            <h3 class="heading-1"><a href="#">{{$row->title}}</a></h3>
                            <div class="meta">
                                <div><a href="#"><span class="icon-calendar"></span>{{$row->created_at}}</a></div>
                                <div><a href="#"><span class="icon-person"></span>{{$row->users->name}}</a></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section> <!-- .section -->

@endsection