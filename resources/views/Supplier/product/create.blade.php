@extends('admin.layout.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Thêm Mới Sản Phẩm</h4>
                        </div>
                    </div>
                    <form action="{{ route('supplier.product.create') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Tên Sản Phẩm<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" name="name" type="text" value={{old('name')}} >
                                @error('name')
                                <span style="color:red" ;>{{ $message }}<span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-12 col-md-2 col-form-label">Số Lượng<span
                                  style="color:red">*</span></label>
                          <div class="col-sm-12 col-md-10">
                              <input class="form-control" name="quantity" type="text" >
                              @error('quantity')
                              <span style="color:red" ;>{{ $message }}<span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Hình Ảnh<span
                                style="color:red">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" name="image" type="file" >
                            @error('image')
                            <span style="color:red" ;>{{ $message }}<span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-12 col-md-2 col-form-label">Đơn Giá<span
                              style="color:red">*</span></label>
                      <div class="col-sm-12 col-md-10">
                          <input class="form-control" name="price" type="text" >
                          @error('price')
                          <span style="color:red" ;>{{ $message }}<span>
                          @enderror
                      </div>
                  </div>
                    <div class="form-group row">
                      <label class="col-sm-12 col-md-2 col-form-label">Chọn Danh Mục</label>
                      <div class="col-sm-12 col-md-10">
                          <select class="custom-select col-12" name="category_id">
                                  @foreach($categories as $category)
                                      <option value="{{ $category->id }}">{{ $category->id }} - {{ $category->name }}</option>
                                  @endforeach
                          </select>
                      </div>
                  </div>
                        <div class="clearfix">
                            <div class="pull-right">
                                <input class="btn btn-primary" type="submit" value="Thêm Mới">
                            </div>
                            <div class="pull-left">
                                <a href="{{ route('supplier.product.list') }}" class="btn btn-dark">Quay Lại</a>
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
