<header class="header trans_300">

  <!-- Top Navigation -->

  <div class="top_nav">
    <div class="container">
      <div class="row">
        <div class="col-md-6">						
        </div>
        <div class="col-md-6 text-right">
          <div class="top_nav_right">
            <ul class="top_nav_menu">

              <!-- Account -->

              <?php if(auth()->user()){?>
								<li class="language">
									<a href="#">						
										{{auth()->user()->name}}
									</a>
								</li>
								<li class="language">
									<a href="{{route('admin.logout')}}">						
										Logout
									</a>
								</li>
								<?php }else {?>
								<li class="language">
									<a href="{{route('admin.user.register')}}">						
										ĐĂNG KÍ
									</a>
								</li>
								<li class="account">
									<a href="{{route('admin.user.login')}}">
										ĐĂNG NHẬP
									</a>
								</li>
								<?php }?>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

	<div class="main_nav_container">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-right">
					<div class="logo_container">
						<a href="{{route('home')}}">LA HERA</span></a>
					</div>
					<nav class="navbar">
						<ul class="navbar_menu">
							<input type="text" placeholder="Tìm kiếm" class="search">
							<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a></li>
						</ul>
						<ul class="navbar_user">								
							<li><a href="{{route('home.profile')}}"><i class="fa fa-user" aria-hidden="true"></i></a></li>
							<li class="checkout">
								<a href="{{route('home.cart.list')}}">
									<i class="fa fa-shopping-cart" aria-hidden="true"></i>
									<span id="checkout_items" class="checkout_items">2</span>
								</a>
							</li>
						</ul>
						<div class="hamburger_container">
							<i class="fa fa-bars" aria-hidden="true"></i>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>

