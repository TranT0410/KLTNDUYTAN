@extends('admin.layout.master')
@section('content')
<div class="main-container">
<form action="{{route('supplier.statistical.list')}}" method="GET">
  <div class="pd-ltr-20">
  <div class="">
        <div class="form-group row">
        <select class="custom-select col-12" name="filter" aria-label="Default select example">
          <option selected value="">Tất Cả</option>
          <option value="monthnow">Tháng Này</option>
          <option value="monthbefore">Tháng Trước</option>
          <option value="year">Năm</option>
        </select>
      </div>
        <div class="form-group row">
          <button class="btn btn-success" type="submit">Lọc</button>
  </div>
      </div>
  </div>
    <div class="row">
      <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
          <div class="d-flex flex-wrap align-items-center">
            <div class="progress-data">
              <div id="chart" style="font-size:65px"><i class="fa-solid fa-pager"></i></div>
            </div>
            <div class="widget-data">
              <div class="weight-600 font-14">Số lượng đơn hàng</div>
              <div class="h4 mb-0">{{$order_count}}</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
          <div class="d-flex flex-wrap align-items-center">
            <div class="progress-data">
              <div id="chart2"style="font-size:65px"><i class="fa-solid fa-circle-check"></i></div>
            </div>
            <div class="widget-data">
              <div class="weight-600 font-14">Số đơn hàng đã hoàn thành</div>
              <div class="h4 mb-0">{{$countFinish}}</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
          <div class="d-flex flex-wrap align-items-center">
            <div class="progress-data">
              <div id="chart3" style="font-size:65px"><i class="fa-solid fa-money-bill-1"></i></div>
            </div>
            <div class="widget-data">
              <div class="weight-600 font-14">Số Tiền</div>
              <div class="h4 mb-0">{{number_format($total_price,'0',',','.')}} VND</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
          <div class="d-flex flex-wrap align-items-center">
            <div class="progress-data">
              <div id="chart4" style="font-size:65px"><i class="fa-solid fa-file-invoice-dollar"></i></div>
            </div>
            <div class="widget-data">
              <div class="weight-600 font-14">Trả Phí Webiste </div>
              <?php $total = $total_price*(15/100) ?>
              <div class="h4 mb-0">{{number_format($total,'0',',','.')}} VND</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 mb-30">
        <div class="card-box height-100-p widget-style1">
          <div class="d-flex flex-wrap align-items-center">
            <div class="progress-data">
              <div id="chart3" style="font-size:65px"><i class="fa-brands fa-paypal"></i></div>
            </div>
            <div class="widget-data">
              <?php  $sales = $total_price - $total?>
              <div class="weight-600 font-14">Doanh Thu Thực Nhận</div>
              <div class="h4 mb-0">{{number_format($sales,'0',',','.')}} VND</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
@endpush
