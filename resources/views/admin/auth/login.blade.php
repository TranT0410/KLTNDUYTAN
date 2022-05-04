<!DOCTYPE html>
<html lang="en">

<head>
	<title>LA HERA</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="{{asset('images/icons/favicon.ico')}}" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('fonts/iconic/css/material-design-iconic-font.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('css/main.css')}}">
	<!--===============================================================================================-->
</head>

<body>
	<div class="container-login100 gradient-background">
		<div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
			<form action="{{route('admin.user.login')}}" method="POST" class="login100-form validate-form">
				@csrf
				<span class="login100-form-title p-b-37">
					Đăng Nhập
				</span>

				<div class="wrap-input100 validate-input m-b-20" data-validate="Vui lòng nhập tên đăng nhập">
					<input class="input100" type="email" name="email" placeholder="Email đăng nhập" value="{{old('email')}}">
					<span class="focus-input100"></span>
				</div>
				@error('email')
				<span style="color:red">{{$message}}</span>
				@enderror
				<div class="wrap-input100 validate-input m-b-25" data-validate="Vui lòng nhập mật khẩu">
					<input class="input100" type="password" name="password" placeholder="Mật khẩu" value="{{old('password')}}">
					<span class="focus-input100"></span>
				</div>
				@error('password')
				<span style="color:red">{{$message}}</span>
				@enderror

				{{-- <div class="wrap-input100 validate-input m-b-25" data-validate="Vui lòng nhập mã xác nhận">
					<input class="input100" type="password" name="pass" placeholder="Mã xác nhận">
					<span class="focus-input100"></span>
				</div> --}}

				 <div class="form-group">
					<div class="captcha-code">
						{!! NoCaptcha::renderJs() !!}
						{!! NoCaptcha::display() !!}
					</div>
				</div>
				@error('g-recaptcha-response')
				<span style="color:red">{{$message}}</span>
				@enderror
				
				<div class="container-login100-form-btn">
					<button class="login100-form-btn" type="submit">
						Đăng Nhập
					</button>
				</div>
				<div class="text-center p-t-57 p-b-20">
					<span class="txt1">
						Chưa có tài khoản? <a href="{{route('admin.user.register')}}" class="txt2 hov1">Đăng ký ngay</a>
					</span>
				</div>
			</form>


		</div>
	</div>



	<div id="dropDownSelect1"></div>

	<!--===============================================================================================-->
	<script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('vendor/animsition/js/animsition.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('vendor/daterangepicker/moment.min.js')}}"></script>
	<script src="{{asset('vendor/daterangepicker/daterangepicker.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('vendor/countdowntime/countdowntime.js')}}"></script>
	<!--===============================================================================================-->
	<script src="{{asset('js/main.js')}}"></script>

</body>

</html>