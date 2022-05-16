@extends('admin.layout.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Thêm Mới Tài Khoản</h4>
                        </div>
                    </div>
                    <form action="{{ route('admin.user.create') }}" method="post">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Tên Tài Khoản <span
                                    style="color: red;">*</span></label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text" placeholder="Name" name="name"
                                       value="{{ old('name') }}">
                                @error('name')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Email <span
                                    style="color: red;">*</span></label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Email" type="text" name="email"
                                       value="{{ old('email') }}">
                                @error('email')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Mật Khẩu <span style="color: red;">*</span></label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Password" type="password" name="password">
                                @error('password')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Xác Nhận Mật Khẩu<span style="color: red;">*</span></label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Password" type="password" name="confirmPassword">
                                @error('confirmPassword')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Địa Chỉ</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Address" type="text" name="address"
                                       value="{{ old('address') }}">
                                @error('address')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Số Điện Thoại</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Phone" type="text" name="phone"
                                       value="{{ old('phone') }}">
                                @error('phone')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Chọn Quyền</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="role">
                                    <option value="0">User</option>
                                    <option value="1">Admin</option>
                                    <option value="2">Supplier</option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="pull-right">
                                <input class="btn btn-primary" type="submit" value="Thêm Mới">
                            </div>
                            <div class="pull-left">
                                <a href="{{ route('admin.user.list') }}" class="btn btn-dark">Quay Lại</a>
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
