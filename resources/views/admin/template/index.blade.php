
@extends('admin.public.base')
@section('body')
    <nav class="breadcrumb">
        <span class="c-cream">模板管理<span class="c-cream ">>模板列表</span></span>
    </nav>
    <div class="page-container ">
        <div class="cl">
            <a class="btn btn-success " onclick="create('增加模板','{{route('admin.template.create_html')}}')" href="javascript:;"><i class="Hui-iconfont">&#xe600;</i>增加模板</a>
        </div>
        <div class="mt-20" >
            <table   class="table table-border table-bordered table-bg table-hover table-sort">
                <thead>
                <tr class="text-c">
                    <th width="40"><input name="" type="checkbox" value=""></th>
                    <th width="80" >主题</th>
                    <th width="100">模型</th>
                    <th width="100">类型</th>
                    <th width="180">名字</th>
                    <th width="180">更新时间</th>
                    <th width="100">操作</th>
                    <th class="text-l">备注</th>
                </tr>
                </thead>
                <tbody>
                <{foreach $template_list as $v}>
                <tr class="text-c">
                    <th width="40"><input name=""  type="checkbox" value=""></th>
                    <th><{$v.theme}></th>
                    <th><{$v.model}></th>
                    <th><{$v.class}></th>
                    <th><{$v.name}></th>
                    <th><{$v.update_time|date="Y-m-d  H:i:s"}></th>
                    <th width="100"><i class=" Hui-iconfont Hui-iconfont-edit2 " onclick="edit('编辑模板','<{:url("admin/template/edit",['id'=>$v.id])}>')"></i></th>
                    <th class="text-l"><{$v.remark|subtext=30}></th>
                </tr>
                <{/foreach}>
                </tbody>
            </table>
        </div>
    </div>



    <script type="text/javascript">

        function create(title,url) {
            var index = layer.open({
                type: 2,
                title:false,
                closeBtn:false,
                content: url
            });
            layer.full(index);
        }
        function edit(title,url) {
            var index = layer.open({
                type: 2,
                title:false,
                closeBtn:false,
                content: url
            });
            layer.full(index);
        }
    </script>

@endsection
