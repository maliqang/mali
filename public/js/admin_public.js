
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
