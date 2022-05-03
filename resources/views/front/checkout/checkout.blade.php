@extends('front.layout.master')

@section('content')
<section class="ftco-section">
<form method="POST" action="{{route('order.create')}}">
  @csrf
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-5 ftco-animate">
        <form action="#" class="billing-form">
          <h3 class="mb-4 billing-heading">THÔNG TIN HÓA ĐƠN</h3>
          <div class="row align-items-end">
            <div class="col-md-12">
              <div class="form-group">
                <label for="firstname">Tên tài khoản</label>
                <input type="text" name="username" class="form-control" placeholder="" value="{{auth()->user()->name}}" readonly>
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="lastname">Tên người nhận</label>
                <input type="text" name="receiver" class="form-control" placeholder="">
              </div>
            </div>
            <div class="w-100"></div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="lastname">Địa chỉ nhận hàng</label>
                <input type="text" name="address" class="form-control" placeholder="">
              </div>
            </div>

            <div class="w-100"></div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="phone">Số điện thoại</label>
                <input type="text" name="phone" class="form-control" placeholder="">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group mt-4">
                <label for="note">Ghi chú</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
              </div>
            </div>
          </div>
        </form><!-- END -->
      </div>
      <div class="col-xl-7 ftco-animate">
        <div class="row">
          <h3 class="mb-4 billing-heading" style="padding-left: 15px;">THÔNG TIN ĐƠN HÀNG</h3>
          <div class="col-md-12 d-flex mb-5">

            <table class="table text-dark " style="margin-top: 35px;">
              <thead>
                <tr>
                  <th scope="col">Mã</th>
                  <th scope="col">Sản phẩm</th>
                  <th scope="col">Số lượng</th>
                  <th scope="col">Đơn giá</th>
                  <th scope="col">Khuyến Mãi</th>
                  <th scope="col">Thành tiền</th>
                </tr>
              </thead>
              <tbody>
              <?php $total_product = 0?>
              @foreach($mycart as $id =>$row)
                <tr>
                  <td>{{$row['id']}}</td>
                  <td>{{$row['name']}}</td>
                  <td>{{$row['quantity']}}</td>
                  <td>{{number_format($row['price'],'0',',','.')}}đ</td>
                  <?php $subtotal = ($row['price']*$row['quantity'])-($row['price']*$row['quantity']*($row['rate']/100)) ?>
                  @if($row['rate'] != null)
                  <td>{{$row['rate']}}%</td>
                  @else
                  <td>0%</td>
                  @endif
                  <td>{{number_format($subtotal,'0',',','.')}}</td>
                  <?php $total_product = $total_product + $subtotal ?>
                </tr>
              @endforeach
              </tbody>
              <tfoot class="text-left mt-3">
                <tr class="shipping">
                  <th>Giao nhận</th>
                  <td colspan="4" class="text-right">Miễn phí</td>

                </tr>
                

                <tr class="order-total">
                  <th>Thuế - {{$tax->name}}</th>
                  <td colspan="4" class="text-right">{{$tax->rate_tax}}%</td>
                </tr>
                <?php $total_order = $total_product + ($total_product*($tax->rate_tax)/100)  ?>
                <tr>
                  <th>Thanh toán</th>
                  <?php session()->get('price_payment');
                        session()->put('price_payment',$total_order)?>
                  <td colspan="4" class="text-right">{{number_format($total_order,'0',',','.')}}₫</td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="col-md-12">
            <div class="cart-detail p-3 p-md-4">
              <h3 class="billing-heading mb-4">Phương thức thanh toán</h3>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="radio">
                    <label><input type="radio" name="optradio" value="0" class="mr-2">Thanh toán khi nhận
                      hàng</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="radio">
                    <label><input type="radio" name="optradio" value="1" class="mr-2">Thanh toán trực
                      tuyến</label>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <div class="checkbox">
                    <label><input type="checkbox" value="" class="mr-2">Tôi đồng ý hết tất cả điều khoản dịch vụ! </label>
                  </div>
                </div>
              </div>
              <div class="payment-box">
                Phí thu hộ: 0 VNĐ. Ưu đãi về phí vận chuyển (nếu có) áp dụng cả với phí thu hộ. <br>
                - Chỉ nhận hàng khi đơn hàng ở trạng thái "ĐANG GIAO HÀNG". <br>
                - Lưu ý kiểm tra mã đơn hàng, mã vận đơn và người gửi TRƯỚC KHI THANH TOÁN.
              </div>
              <input type="submit" class="btn btn-primary py-3 px-4" value="ĐẶT HÀNG">
              </p>
            </div>
          </div>
        </div>
      </div> <!-- .col-md-8 -->
    </div>
  </div>
</form>
</section> <!-- .section -->
@endsection