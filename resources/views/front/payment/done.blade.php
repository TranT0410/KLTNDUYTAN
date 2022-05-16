@extends('front.layout.master')
@section('content')
<div class="container" style="margin-top: 20%;">
  <div class="table-responsive" style="margin-top: 20%;">
      <div class="form-group">
        <h3 class="text-muted">Thông tin đơn hàng</h3>
          <label >Mã đơn hàng:</label>
          
          <label><?php echo $_GET['vnp_TxnRef'] ?></label>
      </div>    
      <div class="form-group">

          <label >Số tiền:</label>
          <label><?=number_format($_GET['vnp_Amount']/100) ?> VND</label>
      </div>  
      <div class="form-group">
          <label >Nội dung thanh toán:</label>
          <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
      </div> 
      <div class="form-group">
          <label >Mã phản hồi (vnp_ResponseCode):</label>
          <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
      </div> 
      <div class="form-group">
          <label >Mã GD Tại VNPAY:</label>
          <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
      </div> 
      <div class="form-group">
          <label >Mã Ngân hàng:</label>
          <label><?php echo $_GET['vnp_BankCode'] ?></label>
      </div> 
      <div class="form-group">
          <label >Thời gian thanh toán:</label>
          <label><?php echo $_GET['vnp_PayDate'] ?></label>
      </div> 
</div>
@endsection