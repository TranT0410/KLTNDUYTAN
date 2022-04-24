<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>LA HERA</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="{{asset('fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="{{asset('css/style-signup.css')}}">
	</head>

	<body>

		<div class="wrapper gradient-background">
			<div class="inner">
				<div class="image-holder">
					<img src="{{asset('images/signup1.png')}}" alt="">
				</div>
				<form action="{{route('admin.user.register')}}" method="POST">
					@csrf
					<div class="form-wrapper">
						@error('name')
            <span style="color: red;">{{ $message }}</span>
            @enderror
						<input type="text" placeholder="Tên đăng nhập" name="name" class="form-control" value="{{old('name')}}">
						<i class="zmdi zmdi-account"></i>
					</div>
					<div class="form-wrapper">
						@error('email')
            <span style="color: red;">{{ $message }}</span>
            @enderror
						<input type="text" placeholder="Email" name="email" class="form-control" value="{{old('email')}}">
						<i class="zmdi zmdi-email"></i>
					</div>
					<div class="form-wrapper">
						@error('password')
            <span style="color: red;">{{ $message }}</span>
            @enderror
						<input type="password" placeholder="Password" name="password" class="form-control" value="{{old('password')}}">
						<i class="zmdi zmdi-lock"></i>
					</div>
          <div class="form-wrapper">
						@error('confirmPassword')
            <span style="color: red;">{{ $message }}</span>
            @enderror
						<input type="password" placeholder="Confirm Password" name="confirmPassword" class="form-control" value="{{old('confirmPassword')}}">
						<i class="zmdi zmdi-lock"></i>
					</div>
					<div class="form-wrapper">
						@error('phone')
            <span style="color: red;">{{ $message }}</span>
            @enderror						
						<input type="text" name="phone" id="phone" placeholder="Số điện thoại" class="form-control" value="{{old('phone')}}" />
						<i class="zmdi zmdi-phone"></i>
					</div>
          <div class="form-wrapper">
						@error('address')
            <span style="color: red;">{{ $message }}</span>
            @enderror						
						<input type="text" name="address"  placeholder="Địa Chỉ" class="form-control" value="{{old('address')}}" />
						<i class="zmdi zmdi-address"></i>
					</div>

					<div class="form-wrapper">
						<input type="radio" name="role" class="agree-term" value="2" />
						<label for="agree-term" class="label-agree-term"><span><span>							
						</span></span>Khách hàng
						</label>
						<input type="radio" value="1" name="role" class="agree-term" style="margin-left: 15px;" />
						<label for="agree-term" class="label-agree-term"><span><span>							
						</span></span>Nhà cung cấp
						</label>
					</div>
					<button type="submit">Đăng kí
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
					{{-- <div class="input-group mb-0">
						<input class="btn btn-primary btn-lg btn-block" type="submit" value="Register">
				</div> --}}
				</form>
			</div>
		</div>	
		
	</body>
</html>