@extends('front.layout.master')

@section('content')
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
          <thead class="thead-primary" style="background: #dda89e;">
            <tr class="text-center">
              <!-- <th>&nbsp;</th> -->
              <th>Thao Tác</th>
              <th>Sản phẩm</th>
              <th>Tên sản phẩm</th>
              <th>Nhà Cung Cấp</th>
              <th>Đơn giá</th>
              <th>Số lượng</th>
              <th>Khuyến mãi</th>
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
                <div class="img" style="background-image:url({{Storage::url($row['image'])}});"></div>
              </td>

              <td class="product-name">
                <h3>{{$row['name']}}</h3>
              </td>
              <td class="product-name">
                @foreach($supplier as $name)
                @if($name->id === $row['supplier_id'])
                <h3>{{$name->name}}</h3>
                @endif
                @endforeach
              </td>
              <td class="price">{{number_format($row['price'],'0',',','.')}}đ</td>
              <td class="quantity">
                <div class="input-group mb-3">
                  @foreach($products as $id_product => $quantity)
                  @if($quantity->id === $row['id']) 
                  <input type="number" name="quantity[{{$id}}]"
                    class="quantity form-control input-number" value="{{$row['quantity']}}" min="1" max="{{$quantity->quantity}}">
                  @endif
                  @endforeach
                </div>
              </td>
              @if($row['rate'] == null)
              <td>0%</td>
              @else
              <td>{{$row['rate']}}%</td>
              @endif
              <?php $rate_product = $row['price']*$row['quantity']*$row['rate']/100 ?>
              <?php $subtotal = $row['price']*$row['quantity'] - $rate_product?>
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
