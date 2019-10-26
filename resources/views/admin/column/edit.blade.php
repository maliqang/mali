@extends('admin.public.base')
@section('body')
    <div  class=" mt-20 cl F8F8F8">
        <div class="ml-50 line-h50 " >
            <a class="f-24  f-l col-offset-10 c-cream " href="{{route('admin.column')}}"><span class="Hui-iconfont Hui-iconfont-menu"></span></a>
        </div>
    </div>
    <div class="page-container ">
        <form class="form form-horizontal" method="post" enctype="multipart/form-data" action="{{route('admin.column.update',['id'=>$column['id']])}}" >
            <div class="row cl">
                <div class="col-xs-12 ">
                    <div class="row cl">
                        <label class="form-label col-xs-8 col-sm-2"><span class="c-red">*</span>栏目名称：</label>
                        <div class="formControls col-xs-12 col-sm-5">
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
                        <label class="form-label col-xs-8 col-sm-2">标题：</label>
                        <div class="formControls col-xs-12 col-sm-5">
                            <input type="text" class="input-text" value="{{$column['title']}}" placeholder=""  name="title">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-8 col-sm-2">关键词：</label>
                        <div class="formControls col-xs-12 col-sm-5">
                            <input type="text" class="input-text" value="{{$column['keyword']}}" placeholder=""  name="keyword">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-8 col-sm-2">描述：</label>
                        <div class="formControls col-xs-12 col-sm-5">
                            <textarea name="description" cols="" rows="" class="textarea"  placeholder="" onKeyUp="$.Huitextarealength(this,100)">{{$column['description']}}</textarea>
                            <p class="textarea-numberbar"><em class="textarea-length">0</em>/100</p>
                        </div>
                    </div>
                </div>

            </div>


            <div class="row cl ">
                <label class="form-label col-xs-8 col-sm-2">上级栏目：</label>
                <div class="formControls col-xs-12 col-sm-5">
						<span class="select-box"  >
						<select name="pid" class="select">
							<option value="0">顶级栏目：</option>
							@foreach($column_tree as $k=>$v)
                                <option @if($column['pid']==$v['id'])selected @endif value="{{$v['id']}}"> @if($v['level']!=0)|{{str_repeat("--",$v['level'])}}@endif{{$v['name']}} </option>
                            @endforeach
						</select>
						</span>
                </div>

            </div>


            <div class="row cl">
                <label class="form-label col-xs-8 col-sm-2">位置： </label>
                <div class="formControls col-xs-12 col-sm-5 model ">
                    <label>上：</label><input  @if($column['position']==1) checked @endif value=1 name="position" type="radio">
                    <label class="ml-20">中：</label><input @if($column['position']==2) checked @endif    value=2 name="position" type="radio">
                    <label class="ml-20">下：</label><input @if($column['position']==3) checked @endif   value=3 name="position" type="radio">
                    <label class="ml-20">左：</label><input @if($column['position']==4) checked @endif   value=4 name="position" type="radio">
                    <label class="ml-20">右：</label><input @if($column['position']==5) checked @endif   value=5 name="position" type="radio">
                    <label class="ml-20">其他：</label><input @if($column['position']==6) checked @endif   value=6 name="position" type="radio">
                </div>
            </div>


            <div class="template_model">

                <div class="row cl">
                    <label class="form-label col-xs-8 col-sm-2">Alt：</label>
                    <div class="formControls col-xs-12 col-sm-1">
                        <input type="text" class="input-text" value="{{$column['alt']}}" placeholder=""  name="alt">
                    </div>

                    <label class="form-label col-xs-8 col-sm-1">Priority：</label>
                    <div class="formControls col-xs-12 col-sm-1">
                        <input type="text" class="input-text" value="{{$column['priority']}}" placeholder=""  name="priority">
                    </div>
                    <label class="form-label col-xs-8 col-sm-1">Rel：</label>
                    <div class="formControls col-xs-12 col-sm-1">
                        <input type="text" class="input-text" value="{{$column['rel']}}" placeholder=""  name="rel">
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-8 col-sm-2">频道模板： </label>
                    <div class="formControls col-xs-12 col-sm-5 model ">
                        <span class="select-box"   >
                        <select name="channel_template_id"  class="select template_model">
                            @foreach($template as $v)
                                @if($v['class']=='频道')
                            <option  @if($column['channel_template_id']==$v['id'])selected @endif  value="{{$v['id']}}" >{{$v['name']}}</option>
                                @endif
                            @endforeach
                        </select>
                        </span>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-8 col-sm-2">列表模板：</label>
                    <div class="formControls col-xs-12 col-sm-5 model ">
                        <span class="select-box"   >
                        <select name="list_template_id" class="select">
                               @foreach($template as $v)
                                @if($v['class']=='列表')
                                    <option @if($column['list_template_id']==$v['id'])selected @endif  value="{{$v['id']}}" >{{$v['name']}}</option>
                                @endif
                            @endforeach
                        </select>
                        </span>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-8 col-sm-2">详情模板：</label>
                    <div class="formControls col-xs-10 col-sm-5 model ">
                        <span class="select-box">
                        <select name="detailed_template_id" class="select">
                              @foreach($template as $v)
                                @if($v['class']=='详情')
                                    <option @if($column['detailed_template_id']==$v['id'])selected @endif value="{{$v['id']}}" >{{$v['name']}}</option>
                                @endif
                               @endforeach
                        </select>
                        </span>
                    </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-8 col-sm-2">单页模板： </label>
                    <div class="formControls col-xs-12 col-sm-5 model ">
                        <span class="select-box"   >
                        <select name="single_template_id" class="select">
                           @foreach($template as $v)
                                @if($v['class']==='')
                                    <option @if($column['single_template_id']==$v['id'])selected @endif value="{{$v['id']}}" >{{$v['name']}}</option>
                                @endif
                            @endforeach
                        </select>
                        </span>
                    </div>
                </div>
            </div>


            <div class="row cl">
                <label class="form-label col-xs-8 col-sm-2">分页条数： </label>
                <div class="formControls col-xs-12 col-sm-5 model ">
                    <input type="text"   class="input-text pagination" placeholder=8 value="8"  name="page"><label>默认8条</label>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-8 col-sm-2"></label>
                <div class="formControls col-xs-12 col-sm-6">
                    <div class="btn-group">
                        <button  class="btn btn-default radius" name="submit" type="submit">更新</button>
                        <a class="btn btn-default radius"  href=" {{route('admin.column')}}" >取消</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection
