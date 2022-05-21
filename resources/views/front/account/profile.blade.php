@extends('front.layout.master')
@section('css')
<link rel="stylesheet" href="{{asset('css/account.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap4/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link href="{{asset('plugins/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{asset('css/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('css/responsive.css')}}">
<link
    href="{{asset('https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap')}}"
    rel="stylesheet">
@endsection
@if(isset($profile))
@section('content')
<div class="container _1QwuCJ">
    <div class="_36cLcR">
        <div class="_1_68zU">
            <a class="_2BuJEf" href="">
                <i class="fa fa-user-circle"></i>
            </a>
            <div class="_2uLDqN">
                <div class="_2lG70n">{{$profile->name}}</div>
                <div>
                    <a class="_27BCO5" href="./account.html">
                        <i class="fa fa-pencil"></i>
                        Sửa hồ sơ
                    </a>
                </div>
            </div>
        </div>
        <div class="_1ZnP-m">
            <div class="stardust-dropdown stardust-dropdown--open">
                <div class="stardust-dropdown__item-header">
                    <a class="_3aAm2h" href="">
                        <div class="_21F-bS">
                            <i class="fa fa-user" style="color: #888 ;"></i>
                        </div>
                        <div>
                            <span class="_3CHLlN">Tài khoản của tôi</span>
                        </div>
                    </a>
                </div>
                <div class="stardust-dropdown__item-body stardust-dropdown__item-body--open"
                    style="opacity: 1;height: auto;">
                    <div class="_3aiYwk">
                        <a class="_3SsG4j _3SzYTH" href="./account.html">
                            <span class="_5PrdXX">Hồ sơ</span>
                        </a>
                        <a class="_3SsG4j" href="{{route('admin.change.password')}}">
                            <span class="_5PrdXX">Đổi mật khẩu</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="stardust-dropdown">
                <div class="stardust-dropdown__item-header">
                    <a class="_3aAm2h" href="{{route('home.orders_confirm')}}">
                        <div class="_21F-bS">
                            <i class="fa fa-list-alt" style="color:#888 ;"></i>
                        </div>
                        <div>
                            <span class="_3CHLlN">Đơn mua</span>
                        </div>
                    </a>
                </div>
                <div class="stardust-dropdown__item-body">
                    <div class="_3aiYwk">
                    </div>
                </div>
            </div>
            <!-- <div class="stardust-dropdown">
      <div class="stardust-dropdown__item-header">
        <a class="_3aAm2h" href="">
          <div class="_21F-bS">
            <img src="https://cf.shopee.vn/file/e10a43b53ec8605f4829da5618e0717c">
          </div>
          <div>
            <span class="_3CHLlN">Thông báo</span>
          </div>
        </a>
      </div>
      <div class="stardust-dropdown__item-body">
        <div class="_3aiYwk">
        </div>
      </div>
    </div> -->
            <!-- <div class="stardust-dropdown">
      <div class="stardust-dropdown__item-header">
        <a class="_3aAm2h" href="">
          <div class="_21F-bS">
            <img src="https://cf.shopee.vn/file/8fc1b46ff604c69726fa6892223da3c3">
          </div>
          <div>
            <span class="_3CHLlN">9.9 ngày siêu mua sắm</span>
          </div>
        </a>
      </div>
      <div class="stardust-dropdown__item-body">
        <div class="_3aiYwk">
        </div>
      </div>
    </div> -->
        </div>
    </div>
    <div class="_3D9BVC">
        <div class="h4QDlo" role="main">
            <div class="_2YiVnW">
                <div class="_2w2H6X">
                    <h1 class="_3iiDCN">Hồ sơ của tôi</h1>
                    <div class="TQG40c">Quản lý thông tin hồ sơ để bảo mật tài khoản</div>
                </div>
                <div class="goiz2O">
                    <div class="pJout2">
                        <form>
                            <div class="_3BlbUs">
                            </div>
                            <div class="_3BlbUs">
                                <div class="_1iNZU3">
                                    <div class="_2PfA-y">
                                        <label>Tên</label>
                                    </div>
                                    <div class="_2_JugQ">
                                        <div class="input-with-validator-wrapper">
                                            <div class="input-with-validator">
                                                <input style="border: none; width: 100%;" type="text"
                                                    value="{{$profile->name}}" placeholder maxlength="255" value>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="_3BlbUs">
                                <div class="_1iNZU3">
                                    <div class="_2PfA-y">
                                        <label>Email</label>
                                    </div>
                                    <div class="_2_JugQ">
                                        <div class="_2bdFDW">
                                            <div class="_3S9myJ">{{$profile->email}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="_3BlbUs">
                                <div class="_1iNZU3">
                                    <div class="_2PfA-y">
                                        <label>Số điện thoại</label>
                                    </div>
                                    <div class="_2_JugQ">
                                        <div class="_2bdFDW">
                                            <div class="_3S9myJ">{{$profile->phone}}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="_1aIEbS">
                        <div class="X1SONv">
                            <div class="_1FzaUZ">
                                <div class="YMBffn">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <input type="file" class="_2xS5eV" accept=".jpg,.jpeg,.png">
                            <i class="fa-solid fa-arrow-up-from-bracket"></i>
                            <div class="_3Jd4Zu">
                                <div class="_3UgHT6">Upload Image</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endif