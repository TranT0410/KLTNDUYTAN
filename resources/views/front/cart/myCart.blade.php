@extends('front.layout.master')

@section('content')
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
            <li><a href="account.html"><i class="fa fa-user" aria-hidden="true"></i></a></li>
            <li class="checkout">
              <a href="cart.html">
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

<div class="fs_menu_overlay"></div>

<div class="hamburger_menu">
<div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
<div class="hamburger_menu_content text-right">
  <ul class="menu_top_nav">
    <li class="menu_item"><a href="index.html">home</a></li>
    <li class="menu_item has-children">
      <a href="#">
        My Account
        <i class="fa fa-angle-down"></i>
      </a>
      <ul class="menu_selection">
        <li><a href="login.html"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
        <li><a href="signup.html"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
      </ul>
    </li>
    <li class="menu_item"><a href="categories.html">shop</a></li>
    <li class="menu_item"><a href="blog.html">blog</a></li>
  </ul>
</div>
</div>

<div class="hero-wrap hero-bread" style="background-image: url('{{asset('images/bg_01.jpg')}}');">
<div class="overlay"></div>
<div class="container">
  <div class="row no-gutters slider-text align-items-center justify-content-center">
    <div class="col-md-9 ftco-animate text-center">
      <!-- <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p> -->
      <h1 class="mb-0 bread">GIỎ HÀNG CỦA TÔI</h1>
    </div>
  </div>
</div>
</div>

<section class="ftco-section ftco-cart">
<form action="{{route('home.cart.update')}}" method="post">
  @csrf
<div class="container">
  <div class="row">
    <div class="col-md-12 ftco-animate">
      <div class="cart-list">
        <table class="table">
          <thead class="thead-primary">
            <tr class="text-center">
              <!-- <th>&nbsp;</th> -->
              <th>Thao Tác</th>
              <th>Sản phẩm</th>
              <th>Tên sản phẩm</th>
              <th>Đơn giá</th>
              <th>Số lượng</th>
              <th>Tất cả</th>
            </tr>
          </thead>
          <tbody>
            <?php $total_cart = 0 ?>
          @if($mycart)
          @foreach($mycart as $id => $row)
            <tr class="text-center">
              <td class="product-remove"  data-id="{{$row['id']}}" route="{{route('home.cart.delete')}}">X</td>

              <td class="image-prod">
                <div class="img" style="background-image:url(images/product-3.jpg);"></div>
              </td>

              <td class="product-name">
                <h3>{{$row['name']}}</h3>
              </td>

              <td class="price">{{number_format($row['price'],'0',',','.')}}đ</td>

              <td class="quantity">
                <div class="input-group mb-3">
                  <input type="number" name="quantity[{{$id}}]"
                    class="quantity form-control input-number" value="{{$row['quantity']}}" min="1">
                </div>
              </td>
              <?php $subtotal = $row['price']*$row['quantity']?>
              <?php $total_cart = $total_cart + $subtotal?>
              <td class="total">{{number_format($subtotal,'0',',','.')}}đ</td>
            </tr><!-- END TR-->
          @endforeach
          @endif
          </tbody>
        </table>
        <input type="submit" value="Cập nhật" style="float:right" class="btn btn-primary py-3 px-5">
      </div>
    </div>
  </div>
  <div class="row justify-content-end">
    <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
      <div class="cart-total mb-3">
        <h3>Mã phiếu giảm giá</h3>
        <p>Nhập mã phiếu giảm giá của bạn nếu bạn có</p>
        <form action="#" class="info">
          <div class="form-group">
            <label for="">Mã phiếu giảm giá</label>
            <input type="text" class="form-control text-left px-3" placeholder="">
          </div>
        </form>
      </div>
      <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Áp dụng phiếu giảm giá</a></p>
    </div>
    <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
      <div class="cart-total mb-3">
        <h3>Ước tính vận chuyển và thuế</h3>
        <p>Nhập điểm đến của bạn để có được ước tính vận chuyển</p>
        <form action="#" class="info">
          <div class="form-group">
            <label for="">Thành Phố</label>
            <input type="text" class="form-control text-left px-3" placeholder="">
          </div>
          <div class="form-group">
            <label for="country">Quận/Huyện</label>
            <input type="text" class="form-control text-left px-3" placeholder="">
          </div>
          <div class="form-group">
            <label for="country">Mã zip/bưu chính</label>
            <input type="text" class="form-control text-left px-3" placeholder="">
          </div>
        </form>
      </div>
      <p><a href="checkout.html" class="btn btn-primary py-3 px-4">Ước tính</a></p>
    </div>
    <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
      <div class="cart-total mb-3">
        <h3>Tổng giỏ hàng</h3>
        <p class="d-flex">
          <span>Tổng tiền hàng</span>
          <span>{{number_format($total_cart,'0',',','.')}}đ</span>
        </p>
        <p class="d-flex">
          <span>Tổng tiền phí vận chuyển</span>
          <span>0.00đ</span>
        </p>
        <p class="d-flex">
          <span>Giảm giá </span>
          <span></span>
        </p>
        <hr>
        <p class="d-flex total-price">
          <span>Tổng tiền thanh toán</span>
          <span>{{number_format($total_cart,'0',',','.')}}đ</span>
        </p>
      </div>
      <p><a href="{{route('home.checkout')}}" class="btn btn-primary py-3 px-4">Tiến tới thanh toán</a></p>
    </div>
  </div>
</div>
</form>
</section>
@endsection
