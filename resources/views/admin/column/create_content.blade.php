@extends('admin.public.base')
@section('body')
    <div  class=" mt-20 cl F8F8F8">
        <div class="ml-50 line-h50 " >
            <a class="f-24  c-cream f-l col-offset-10 " href="{{route('admin.column')}}"><span class="Hui-iconfont Hui-iconfont-menu"></span></a>
        </div>
    </div>
    <div class="page-container column_create cl ">

        <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="{{route('admin.column.update',['id'=>$column['id']])}}" >
            <div class="row cl">
                <div class="col-xs-12 col-sm-8">
                    <div class="row cl">
                        <label class="form-label col-xs-8 col-sm-4"><span class="c-red">*</span>栏目名称：</label>
                        <div class="formControls col-xs-12 col-sm-8">
                            <input type="text" class="input-text" value="{{$column['name']}}" placeholder=""  name="name">
                        </div>
                        @if ($errors->any())
                            <div class="col-xs-5 c-red size-S">
                                @foreach ($errors->get('name') as $error)
                                    <p class="c-red size-S">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-8 col-sm-4"><span class="c-red">*</span>标题：</label>
                        <div class="formControls col-xs-12 col-sm-8">
                            <input type="text" class="input-text" value="{{$column['title']}}" placeholder=""  name="title">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-8 col-sm-4">关键词：</label>
                        <div class="formControls col-xs-12 col-sm-8">
                            <input type="text" class="input-text" value="{{$column['keyword']}}"  id="" name="keyword">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-8 col-sm-4">描述：</label>
                        <div class="formControls col-xs-12 col-sm-8">
                            <textarea name="description" cols="" rows="" class="textarea"  placeholder="" onKeyUp="$.Huitextarealength(this,160)">{{$column['description']}}</textarea>
                            <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-8 col-sm-4">Alt：</label>
                        <div class="formControls col-xs-12 col-sm-2">
                            <input type="text" class="input-text" value="{{$column['alt']}}" placeholder=""  name="alt">
                        </div>

                        <label class="form-label col-xs-8 col-sm-2">Priority：</label>
                        <div class="formControls col-xs-12 col-sm-1">
                            <input type="text" class="input-text" value="{{$column['priority']}}" placeholder=""  name="priority">
                        </div>
                        <label class="form-label col-xs-8 col-sm-1">Rel：</label>
                        <div class="formControls col-xs-12 col-sm-1">
                            <input type="text" class="input-text" value="{{$column['rel']}}" placeholder=""  name="rel">
                        </div>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-offset-1 col-sm-2 cover" style="min-width: 200px">
                    <img style="max-height: 100px; background: #ffffff; display: block" id="img" src="{{$column['image']}}">
                    <span class="btn-upload">
                        <input class="input-text" style="display: none" type="text"  readonly="">
                        <a href="javascript:void();" style="width: 100px" class="btn btn-default"><i class="Hui-iconfont"></i> 浏览文件</a>
                        <input type="file" multiple="" id="pic" value="" name="img" class="input-file ">
                    </span>
                    @if ($errors->any())
                        @foreach ($errors->get('img') as $error)
                            <p class="c-red size-S">{{ $error }}</p>
                        @endforeach
                    @endif
                </div>

            <div class="row cl">
                <div class=" col-xs-9 mt-50 col-xs-offset-2">
                    <script id="editor" type="text/plain" style="width:100%;height:600px;">{!! $column['content'] !!}</script></div>
            </div>

            <div class="row cl">
                <label class="form-label col-xs-8 col-sm-2"></label>
                <div class="formControls col-xs-12 col-sm-8 mt-50">
                    <div class="btn-group">
                        <button  class="btn btn-default radius" name="submit" type="submit"><i class="Hui-iconfont">&#xe632;</i>更新</button>
                        <a class="btn btn-default radius"  href=" {{route('admin.column')}}">取消</a>
                    </div>
                </div>
            </div>

        </form>
    </div>
    <script type="text/javascript" src="/node_modules/H-ui/lib/ueditor/1.4.3/ueditor.config.js"></script>
    <script type="text/javascript" src="/node_modules/H-ui/lib/ueditor/1.4.3/ueditor.all.js"> </script>
    <script type="text/javascript" src="/node_modules/H-ui/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>

    <script>

        $(function () {
            var ue = UE.getEditor('editor',{
                textarea:"content"
            });
        })
    </script>

@endsection
