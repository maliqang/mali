
$(function(){

    //配置信息选项卡
    $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });
    $("#tab-system").Huitab({
        index:0
    });

    $('.table-sort').dataTable({
        "aaSorting": [[ 1, "desc" ]],//默认第几个排序
        "bStateSave": true,//状态保存
        'searching': false,
        "info": false,
        "paging":false,
        "aoColumnDefs": [
            //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
            {"orderable":false,"aTargets":[]}// 不参与排序的列
        ]
    });
});
//建立一個可存取到該file的url
function getObjectURL(file) {
    var url = null ;
    if (window.createObjectURL!=undefined) {
        url = window.createObjectURL(file) ;
    } else if (window.URL!=undefined) {
        url = window.URL.createObjectURL(file) ;
    } else if (window.webkitURL!=undefined) {
        url = window.webkitURL.createObjectURL(file) ;
    }
    return url ;
}
//图片实时预览 End




// 图片实时预览
$(function(){

    //公众号
    $("#wechat1").change(function(){
        if($.support.msie){
            $("#wechat").attr("src",$(this).val())
            $("#info").text("当前选择的文件:"+$(this).val())
        }else{
            $("#info").text("当前选择的文件:"+$(this).val())
            var objUrl=getObjectURL(this.files[0]);
            console.log("objUrl="+objUrl);
            if(objUrl){
                $("#wechat").attr("src",objUrl);

            }
        }
    })
    // LOGO
    $("#logo1").change(function(){
        if($.support.msie){
            $("#logo").attr("src",$(this).val())
            $("#info1").text("当前选择的文件:"+$(this).val())
        }else{
            $("#info1").text("当前选择的文件:"+$(this).val())
            var objUrl=getObjectURL(this.files[0]);
            console.log("objUrl="+objUrl);
            if(objUrl){
                $("#logo").attr("src",objUrl);

            }
        }
    })

    // 通用
    $("#pic").change(function(){
        if($.support.msie){
            $("#img").attr("src",$(this).val())
            $("#info").text("当前选择的文件:"+$(this).val())
        }else{
            $("#info").text("当前选择的文件:"+$(this).val())
            var objUrl=getObjectURL(this.files[0]);
            console.log("objUrl="+objUrl);
            if(objUrl){
                $("#img").attr("src",objUrl);

            }
        }
    })

});


//创建新窗口
function create(title,url) {
    var index = layer.open({
        type: 2,
        title:false,
        closeBtn:false,
        content: url
    });
    layer.full(index);
}
//删除
function destroy(obj,url) {
    layer.confirm('确认要删除吗？', function (index) {
        $.ajax({
            type: 'get',
            url:url ,
            dataType: 'json',
            success: function (data) {
                if(data.status==1){
                    $(obj).parents("tr").remove();
                    layer.msg(data.result, {icon: 1, time: 1000});
                }else {
                    layer.msg(data.result, {icon: 1, time: 1000});

                }
            },
            error: function (data) {
                console.log(data.msg);
            },
        });
    });
}




//排序
function sort(url) {
    $(".sort").change(function () {
        sort=$(this).val()
        id=$(this).attr('column')
        $.ajax({
            type: 'get',
            url: url,
            data: {'id': id, "sort": sort},
            dataType: 'json',
            success:function (data) {
            }
        })
    })
}


//反转布尔值

function convert_cloth(obj,url,id) {
    if($(obj).find('span').hasClass('btn-danger')){
        $(obj).find('span').removeClass("btn-danger").addClass("btn-default").html('YES')
        $.ajax({
            type: 'get',
            url: url,
            data: {'id': id, "value": 1},
            dataType: 'json',
        })
    }else{
        $(obj).find('span').removeClass("btn-default").addClass("btn-danger").html('NO')
        $.ajax({
            type: 'get',
            url: url,
            data: {'id': id, "value": 0},
            dataType: 'json',
        })
    }
}
