@extends('front.layout.master');
@section('content')
<div class="_3D9BVC">
  <div class="h4QDlo" role="main">
    <form action="{{route('admin.change.password')}}" method = "POST">
      @csrf
      <div class="kJiu0u">
        <div class="ZsX2q-">
          <h1 class="_2xVij2">Đổi mật khẩu</h1>
          <div class="_2PlnUp">Để bảo mật tài khoản, vui lòng không chia sẻ mật khẩu cho người
            khác</div>
        </div>
        @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
      </div>
      <div class="_2gERne">
        <div class="eSOrcn">
          <div class="_3m9JxV">
            <div class="_1p2sNF">
              <div class="J7OZkm">
                <label class="_3W1PU2" for="password">Mật khẩu hiện tại</label>
              </div>
              <div class="_38MRMp">
                <input type="password" name="password" id="password"
                  class="_2R9TsD _3_Hq9P">
                  
              </div>
              @error('password')
              <span style="color:red" ;>{{ $message }}<span>
              @enderror
              <button class="_1fdENx">Quên mật khẩu ?</button>
            
            </div>
          </div>
        </div>
        <div class="eSOrcn">
          <div class="_3m9JxV">
            <div class="_1p2sNF">
              <div class="J7OZkm">
                <label class="_3W1PU2" for="password">Mật khẩu mới</label>
              </div>
              <div class="_38MRMp">
                <input type="password" name="passwordNew" id="newPassword"
                  class="_2R9TsD _3_Hq9P">
              </div>
              @error('passwordNew')
              <span style="color:red" ;>{{ $message }}<span>
              @enderror
            </div>
          </div>
         
        </div>
        <div class="eSOrcn">
          <div class="_3m9JxV">
            <div class="_1p2sNF">
              <div class="J7OZkm">
                <label class="_3W1PU2" for="password">Xác nhận mật khẩu</label>
              </div>
              <div class="_38MRMp">
                <input type="password" name="confirmPassword" id="newPasswordRepeat"
                  class="_2R9TsD _3_Hq9P">
              </div>
              @error('confirmPassword')
              <span style="color:red" ;>{{ $message }}<span>
              @enderror
            </div>
          </div>
        </div>
        <div class="eSOrcn">
          <div class="_1DS7fG"></div>
          <div class="_1IcdS-">
            <button class="btn btn-solid-primary btn--m btn--inline " type="submit">Xác
              nhận</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

</div>
@endsection