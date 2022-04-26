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