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
<div class="container" style="margin-top: 50px">
    <div class="table-responsive" style=";">
        <div class="form-group">
            <h3 class="text-muted"
                style="color:#dda89e !important ;text-transform: uppercase; font-weight: 700;font-size: 35px;">
                Thông tin đơn hàng</h3>
            <!-- <label>Mã đơn hàng:</label> -->
            <label style="color:#000 !important; font-weight:500;">Mã đơn hàng:</label>
            <label><?php echo $_GET['vnp_TxnRef'] ?></label>
        </div>
        <div class=" form-group">

            <label style="color:#000 !important; font-weight:500;">Số tiền:</label>
            <label><?=number_format($_GET['vnp_Amount']/100) ?> VND</label>
        </div>
        <div class=" form-group">
            <label style="color:#000 !important; font-weight:500;">Nội dung thanh toán:
            </label>
            <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
        </div>
        <div class="form-group">
            <label style="color:#000 !important; font-weight:500;">Mã phản hồi (vnp_ResponseCode):</label>

            <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
        </div>
        <div class="form-group">
            <label style="color:#000 !important; font-weight:500;">Mã GD Tại VNPAY:</label>
            <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
        </div>
        <div class="form-group">
            <label style="color:#000 !important; font-weight:500;">Mã Ngân hàng:</label>
            <label><?php echo $_GET['vnp_BankCode'] ?></label>
        </div>
        <div class="form-group">
            <label style="color:#000 !important; font-weight:500;">Thời gian thanh toán:</label>
            <label><?php echo $_GET['vnp_PayDate'] ?></label>
        </div>
    </div>

</div>
@endsection