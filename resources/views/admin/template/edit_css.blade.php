@extends('admin.public.base')
@section('body')

    <div class="page-container">
        <form  class="form form-horizontal " method="post" action="{{route('admin.template.update.css',['id'=>$template->id])}}"  >
            <p class="c-danger">样式表备注：</p>
            <textarea name="remark" class="textarea">{{$template->remark}}</textarea>
            <textarea style="min-height: 600px"  name="content" class="textarea">{{$content}}</textarea>
            <div class="btn-group mt-20">
                <button  class="btn btn-default radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
                <a class="btn btn-default radius"  href=" {{route('admin.template.css')}}">取消</a>
            </div>
        </form>
    </div>
@endsection
