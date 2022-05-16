@extends('admin.layout.master')

@section('content')
    <div class="main-container">
        <div class="pd-ltr-20 xs-pd-20-10">
            <div class="min-height-200px">
                <div class="pd-20 card-box mb-30">
                    <div class="clearfix">
                        <div class="pull-left">
                            <h4 class="text-blue h4">Cập Nhật Tin Tức</h4>
                        </div>
                    </div>
                    <form action="{{ route('admin.news.update',$news->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Tiêu Đề<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-12 col-md-10">

                                <input class="form-control post-title" type="text" name="title" placeholder="Title" value="{{$news->title}}">
                                @error('title')
                                <span style="color:red" ;>{{ $message }}<span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Hình Ảnh</label>
                            <div class="col-sm-12 col-md-10">
                                <input class="form-control post-img" type="file" name="image" value="{{$news->image}}">
                                @error('image')
                                <span style="color:red" ;>{{ $message }}<span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-md-2 col-form-label">Nội Dung<span
                                    style="color:red">*</span></label>
                            <div class="col-sm-12 col-md-10">
                            <textarea class="textarea_editor form-control border-radius-0 post-content"
                                      name="content">{{ $news->content }}</textarea>
                                @error('content')
                                <span style="color:red" ;>{{ $message }}<span>
                                @enderror
                            </div>
                        </div>
                        <div class="clearfix">
                            <div class="pull-right">
                                <a href="{{ route('admin.news.list') }}" class="btn btn-dark">Quay Lại</a>
                                <input class="btn btn-primary" name="submit" type="submit" value="Cập Nhật">
                            </div>
                            {{-- <div class="pull-left">
                                <div class="btn-list">
                                    <input class="btn btn-info preview-post" type="button" name="" value="Preview">
                                    <input class="btn btn-primary save-draft" type="submit" name="" value="Save draft">
                                </div>
                            </div> --}}
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
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="preview">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection