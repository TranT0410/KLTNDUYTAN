<header class="header trans_300">
    <div class="top_nav">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                </div>
                <div class="col-md-6 text-right">
                    <div class="top_nav_right">
                        <ul class="top_nav_menu">
                            <?php if(auth()->user()){?>
                            <li class="language">
                                <a href="#">
                                    {{auth()->user()->name}}
                                </a>
                            </li>
                            <li class="language">
                                <a href="{{route('admin.logout')}}">
                                    Đăng xuất
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
                        <form action="{{route('home.search')}}" method="GET">
                            @csrf
                            <ul class="navbar_menu">
                                <input type="text" placeholder="Tìm kiếm" class="search" name="search">
                                <li><button class="btn btn-primary" type="submit" name="submit-search"><i
                                            class="fa fa-search" aria-hidden="true"></i></button></li>
                            </ul>
                        </form>
                        <ul class="navbar_user">
                            <li><a href="{{route('home.profile')}}"><i class="fa fa-user" aria-hidden="true"></i></a>
                            </li>
                            <li class="checkout">
                                <a href="{{route('home.cart.list')}}">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    <?php
									$cart = session()->get('my_cart');
											if ($cart != null) {
													$count = count($cart);
											} else {
													$count = 0;
											}
									 ?>
                                    <span id="checkout_items" class="checkout_items">{{$count}}</span>
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