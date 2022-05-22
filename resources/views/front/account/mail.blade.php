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
@endsection<p>
    Xin chào bạn,Đây là mã email xác nhận tài khoản của hệ thống
</p>
<?php $dataEmail = session('email'); ?>
<p>
    MÃ XÁC NHẬN LÀ:
</p>
<ul>
    <li><strong>{{ $dataEmail['code'] }}</strong></li>
</ul>
<hr>
<p>
    Xin cảm ơn
</p>