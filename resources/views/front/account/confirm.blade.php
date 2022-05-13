@extends('front.layout.master')

@section('content')
<div class="_3D9BVC">
  <div class="h4QDlo" role="main">
    <form action = "{{route('admin.confirm.email')}}" method="POST">
      @csrf
      <div class="_2gERne">
        @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
        <div class="eSOrcn">
          <div class="_3m9JxV">
            <div class="_1p2sNF">
              <div class="J7OZkm">
                <label class="_3W1PU2" for="password">Xác nhận email</label>
              </div>
              <div class="_38MRMp">
                <input type="text" name="confirmEmail" id="newPasswordRepeat"
                  class="_2R9TsD _3_Hq9P">
              </div>
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
@endsection