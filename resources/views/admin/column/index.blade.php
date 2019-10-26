@extends('admin.public.base')
@section('body')
    <nav class="breadcrumb"><span class="c-cream ">栏目管理&gt;栏目列表</span></nav>
    <div class="page-container">
        <div class="cl">
            <a class="btn btn-default" onclick="create('新建栏目','{{route('admin.column.create')}}')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i>新建栏目</a>
        </div>
        <div class="mt-20 " >
            <table   class="table table-border table-bordered table-bg table-hover ">
                <thead>
                <tr class="text-c">
                    <th width="60">排序</th>
                    <th width="80">模型</th>
                    <th >栏目名称</th>
                    <th width="120">更新时间</th>
                    <th width="40">状态</th>
                    <th width="40">导航</th>
                    <th width="100">添加子栏目</th>
                    <th width="100">更新栏目内容</th>
                    <th width="100">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($list as $k=>$v)
                <tr class="text-c">
                    <td><input name="sort" class="text-c input-text size-S sort "  column="{{$v['id']}}"  value="{{$v['sort']}}" /></td>
                    <th >{{$v['model']}}</th>
                    <td class="text-l c-cream">@if($v['level']!=0)|{{str_repeat("--",$v['level'])}}@endif{{$v['name']}}</td>
                    <td>{{$v['updated_at']}}</td>
                    <td class="td-status" onclick="convert_cloth(this,'{{route('admin.column.status')}}',{{$v['id']}})">
                        @if($v['status']==0)
                        <span class="btn size-MINI btn-danger  radius ">NO</span>
                        @else
                        <span class="btn size-MINI btn-default  radius ">YES</span>
                        @endif
                    </td>
                    <td class="td-status" onclick="convert_cloth(this,'{{route('admin.column.is_nav')}}',{{$v['id']}})">
                        @if($v['is_nav']==0)
                        <span class="btn size-MINI btn-danger  radius ">NO</span>
                        @else
                        <span class="btn size-MINI btn-default radius ">YES</span>
                        @endif
                    </td>
                    <th>
                        @if($v['model']!="单页")
                        <a class="btn size-MINI btn-default radius" onclick="create('添加子栏目','{{route('admin.column.create_son',['id'=>$v['id']])}}')"  href="javascript:;">子栏目</a>
                        @endif
                    </th>
                    <th width="60">
                        <a class="btn size-MINI btn-default radius" onclick="create('更新栏目内容','{{route('admin.column.create_content',['id'=>$v['id']])}}')">内容</a>
                    </th>
                    <td class="td-manage">
                        <a class="ml-5 c-green" onClick="create('编辑栏目','{{route('admin.column.edit',["id"=>$v['id']])}}')" href="javascript:;" ><i class="Hui-iconfont fz125">&#xe60c;</i></a>
                        <a  class="ml-5 c-danger" onClick="destroy(this,'{{route('admin.column.destroy',["id"=>$v['id']])}}')" href="javascript:;" ><i class="Hui-iconfont fz125">&#xe6e2;</i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <script type="text/javascript">

        $(function () {
            sort('{{route('admin.column.sort')}}')
        })
    </script>
@endsection
