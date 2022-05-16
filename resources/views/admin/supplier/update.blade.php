@extends('admin.layout.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 card-box mb-30">
                    @if (session('status'))
                        <div class="alert alert-danger">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Cập Nhật Nhà Cung Cấp</h4>
                        </div>
                    </div>
                    <form action="{{ route('admin.supplier.edit', $supplier->id) }}" method='POST'>
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Tên Nhà Cung Cấp<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" name="name" value="{{ $supplier->name }}">
                                @error('name')
                                <span style="color:red" ;>{{ $message }}<span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-12 col-md-2 col-form-label">Địa Chỉ<span
                                  style="color:red">*</span></label>
                          <div class="col-sm-12 col-md-10">
                              <input class="form-control" type="text" name="address" value="{{ $supplier->address}}">
                              @error('address')
                              <span style="color:red" ;>{{ $message }}<span>
                              @enderror
                          </div>
                      </div>
                      <div class="form-group row">
                        <label class="col-sm-12 col-md-2 col-form-label">Số Điện Thoại<span
                                style="color:red">*</span></label>
                        <div class="col-sm-12 col-md-10">
                            <input class="form-control" type="text" name="phone" value="{{ $supplier->phone }}">
                            @error('phone')
                            <span style="color:red" ;>{{ $message }}<span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-sm-12 col-md-2 col-form-label">Tài Khoản</label>
                      <div class="col-sm-12 col-md-10">
                          <select class="custom-select col-12" name="user_id">
                                  @foreach($users as $user)
                                      <option value="{{ $user->id }}" {{$user->id === $supplier->user_id ? ' selected' : '' }}>{{ $user->id }} - {{ $user->name }}</option>
                                  @endforeach
                          </select>
                      </div>
                  </div>
                        <div class="clearfix">
                            <div class="pull-right">
                                <input class="btn btn-primary" type="submit" value="Cập Nhật">
                            </div>
                            <div class="pull-left">
                                <a href="{{ route('admin.category.list') }}" class="btn btn-dark">Quay Lại</a>
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
