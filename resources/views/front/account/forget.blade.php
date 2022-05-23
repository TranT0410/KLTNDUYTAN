@extends('front.layout.master');
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
<link rel="stylesheet" type="text/css" href="{{asset('css/password.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection
@section('content')
<div class="_3D9BVC">
  <div class="h4QDlo" role="main">
    <form action="{{route('admin.forget.password')}}" method = "POST">
      @csrf
      <div class="kJiu0u">
        @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
      </div>
      <div class="_2gERne">
        <div class="eSOrcn">
          <div class="_3m9JxV">
            <div class="_1p2sNF">
              <div class="J7OZkm">
                <label class="_3W1PU2" for="password">Email đăng nhập</label>
              </div>
              <div class="_38MRMp">
                <input type="email" name="email" 
                  class="_2R9TsD _3_Hq9P">
                  
              </div>
              @error('email')
              <span style="color:red" ;>{{ $message }}<span>
              @enderror
            </div>
          </div>
        </div>
        <div class="eSOrcn">
          <div class="_3m9JxV">
            <div class="_1p2sNF">
              <div class="J7OZkm">
                <label class="_3W1PU2" for="password">Mật khẩu mới</label>
              </div>
              <div class="_38MRMp">
                <input type="password" name="passwordNew" id="newPassword"
                  class="_2R9TsD _3_Hq9P">
              </div>
              @error('passwordNew')
              <span style="color:red" ;>{{ $message }}<span>
              @enderror
            </div>
          </div>
         
        </div>
        <div class="eSOrcn">
          <div class="_3m9JxV">
            <div class="_1p2sNF">
              <div class="J7OZkm">
                <label class="_3W1PU2" for="password">Xác nhận mật khẩu</label>
              </div>
              <div class="_38MRMp">
                <input type="password" name="confirmPassword" id="newPasswordRepeat"
                  class="_2R9TsD _3_Hq9P">
              </div>
              @error('confirmPassword')
              <span style="color:red" ;>{{ $message }}<span>
              @enderror
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

</div>
@endsection