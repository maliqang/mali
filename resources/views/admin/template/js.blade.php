@extends('admin.public.base')
@section('body')
    <nav class="breadcrumb">
        <span class="c-cream">模板管理<span class="c-cream ">>JS文件列表</span></span>
    </nav>
    <div class="page-container ">
        <div class="cl">
            <a class="btn btn-default" onclick="create('增加JS文件','{{route('admin.template.create_js')}}')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i>增加JS文件</a>
        </div>
        <div class="mt-20" >
            <table   class="table table-border table-bordered table-bg table-hover table-sort">
                <thead>
                <tr class="text-c">
                    <th width="40"><input name="" type="checkbox" value=""></th>
                    <th width="80" >主题</th>
                    <th width="180">名字</th>
                    <th width="180">更新时间</th>
                    <th width="100">操作</th>
                    <th class="text-l">备注</th>
                </tr>
                </thead>
                <tbody>
                @foreach($css as $v)
                    <tr class="text-c">
                        <th width="40"><input name=""  type="checkbox" value=""></th>
                        <th>{{$v->theme}}</th>
                        <th>{{$v->name}}</th>
                        <th>{{$v->updated_at}}</th>
                        <th width="100">
                            <i class=" Hui-iconfont Hui-iconfont-edit2 " onclick="create('编辑JS文件','{{route('admin.template.edit_js',['id'=>$v->id])}}')"></i>
                            <i class="Hui-iconfont Hui-iconfont-del2" onclick="destroy(this,'{{route('admin.template.destroy',['id'=>$v->id])}}')"></i>
                        </th>
                        <th class="text-l">{{$v->remark}}</th>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
