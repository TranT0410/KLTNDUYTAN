@extends('front.layout.master')
@section('css')
<!-- <link rel="stylesheet" href="{{asset('css/account.css')}}"> -->
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('css/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/password.css')}}">
<link
    href="{{asset('https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap')}}"
    rel="stylesheet">
@endsection
@section('content')
<div class="_3D9BVC">
    <div class="h4QDlo" role="main">
        <form action="{{route('admin.confirm.emailForget')}}" method="POST">
            @csrf
            <div class="_2gERne">
                @if (session('status'))
                <div class="alert alert-danger">
                    {{ session('status') }}
                </div>
                @endif
                <div class="eSOrcn">
                    <div class="_3m9JxV">
                        <div class="_1p2sNF">
                            <div class="J7OZkm">
                                <label class="_3W1PU2" for="password">Xác nhận email</label>
                            </div>
                            <div class="_38MRMp">
                                <input type="text" name="confirmEmail" id="newPasswordRepeat" class="_2R9TsD _3_Hq9P">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="eSOrcn">
                    <div class="_1DS7fG"></div>
                    <div class="_1IcdS-">
                        <button class="btn btn-solid-primary btn--m btn--inline " type="submit">Xác
                            nhận</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection