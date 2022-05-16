@extends('admin.layout.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Cập Nhật Sản Phẩm Khuyến Mãi</h4>
                        </div>
                    </div>
                    <form action="{{ route('supplier.promotion.update_product',$promotion->id) }}" method="POST" >
                        @csrf
                        <div class="form-group row">
                          <label class="col-sm-12 col-md-2 col-form-label">Phần Trăm Khuyến Mãi<span
                                  style="color:red">*</span></label>
                          <div class="col-sm-12 col-md-10">
                              <input class="form-control" name="rate" type="number" min="0" max="100" value="{{$promotion->rate}}">
                              @error('rate')
                            <span style="color:red" ;>{{ $message }}<span>
                            @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Mô Tả<span
                                style="color:red">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="description" type="text" value="{{$promotion->description}}">
                            @error('description')
                            <span style="color:red" ;>{{ $message }}<span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Sản Phẩm Khuyến Mãi</label>
                        <div class="col-sm-12 col-md-10">
                            <select class="custom-select col-12" name="product_id">
                              @foreach($products as $product)
                                <option value="{{$product->id}}" {{$product->id===$promotion->product_id ? 'selected' : ''}}>{{$product->name}}</option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                  <div class="form-group row">
                    <label class="col-sm-12 col-md-2 col-form-label">Chương Trình Khuyến Mãi</label>
                    <div class="col-sm-12 col-md-10">
                        <select class="custom-select col-12" name="promotion_id">
                            <option value="{{$promotion->promotion_id}}">{{$promotion->promotions->name}}</option>
                        </select>
                    </div>
                </div>
                        <div class="clearfix">
                            <div class="pull-right">
                                <input class="btn btn-primary" type="submit" value="Cập Nhật">
                            </div>
                            <div class="pull-left">
                                <a href="{{ route('supplier.promotion.list') }}" class="btn btn-dark">Quay Lại</a>
                            </div>
                        </div>
                    </form>
                    <div class="collapse collapse-box" id="basic-form1">
                        <div class="code-box">
                            <div class="clearfix">
                                <a href="javascript:;" class="btn btn-primary btn-sm code-copy pull-left"
                                   data-clipboard-target="#copy-pre"><i class="fa fa-clipboard"></i> Copy Code</a>
                                <a href="#basic-form1" class="btn btn-primary btn-sm pull-right" rel="content-y"
                                   data-toggle="collapse" role="button"><i class="fa fa-eye-slash"></i> Hide Code</a>
                            </div>
                            <pre><code class="xml copy-pre" id="copy-pre">
					</code></pre>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
