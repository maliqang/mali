@extends('admin.public.base')
@section('body')
    <div class="page-container">
        <form class="form form-horizontal mt-50" method="post" enctype="multipart/form-data" action="{{route('admin.template.store.css')}}" >
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">主题：</label>
                <div class="formControls col-xs-8 col-sm-4">
                    <input type="text"  class="input-text" value="default"  name="theme">
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">样式文件：</label>
                <div class="formControls col-xs-8 col-sm-4">
                    <span class="btn-upload form-group">
                        <input class="input-text upload-url " type="text" name="uploadfile"  readonly>
                        <a href="javascript:void();" class="btn btn-default "><i class="Hui-iconfont">&#xe642;</i> 浏览文件</a>
                        <input type="file" multiple name="file" class="input-file">
                    </span>
                </div>
                @if (session('status_file'))
                    <label class="col-xs-4 col-sm-2 c-red">
                        {{ session('status_file') }}
                    </label>
                @endif
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">创建空样式表：</label>
                <div class="formControls col-xs-8 col-sm-4">
                    <input type="text"  name="name" class="input-text">
                </div>
                @if (session('status_name'))
                    <label class="col-xs-4 col-sm-2 c-red">
                        {{ session('status_name') }}
                    </label>
                @endif
                @if ($errors->any())
                    <label class="col-xs-4 col-sm-2 c-red">
                        @foreach ($errors->get('name') as $error)
                            {{ $error }}
                        @endforeach
                    </label>
                @endif
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-2">备注：</label>
                <div class="formControls col-xs-8 col-sm-4">
                    <textarea name="remark" class="textarea"></textarea>
                </div>
            </div>
            <div class="row cl">
                <div class="col-xs-8 col-sm-4 col-xs-offset-4 col-sm-offset-2">
                    <div class="btn-group mt-50">
                        <button  class="btn btn-default radius" name="submit" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
                        <a class="btn btn-default radius"  href=" {{route('admin.template.css')}}">取消</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
