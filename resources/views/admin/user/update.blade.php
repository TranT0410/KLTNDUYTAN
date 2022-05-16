@extends('admin.layout.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Cập Nhật Người Dùng</h4>
                        </div>
                    </div>
                    <form action="{{ route('admin.user.edit', $user->id) }}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Tên Người Dùng <span
                                    style="color: red;">*</span></label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" type="text"  name="name"
                                       value="{{ $user->name }}">
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
                                       value="{{ $user->email }}" readonly>
                                @error('email')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Địa Chỉ</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Address" type="text" name="address"
                                       value="{{ $user->address }}">
                                @error('address')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Số Điện Thoại</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control" placeholder="Phone" type="text" name="phone"
                                       value="{{ $user->phone }}">
                                @error('phone')
                                <span style="color: red;">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Chọn Quyền</label>
                            <div class="col-sm-12 col-md-10">
                                <select class="custom-select col-12" name="role">
                                    <option value="0" {{ $user->role === config('constants.role_admin') ? 'selected' : '' }}>
                                        Admin
                                    </option>
                                    <option value="1" {{ $user->role === config('constants.role_supplier') ? 'selected' : '' }}>
                                        Supplier
                                    </option>
                                    <option value="2" {{ $user->role === config('constants.role_customer') ? 'selected' : '' }}>
                                        User
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="pull-right">
                                <input class="btn btn-primary" type="submit" value="Cập Nhật">
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
