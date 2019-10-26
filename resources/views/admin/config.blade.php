@extends('admin.public.base')
@section('body')
    <nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页
        <span class="c-gray en">&gt;</span>
        系统管理
        <span class="c-gray en">&gt;</span>
        基本设置
        <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a>
    </nav>
    <div class="page-container">

            <div id="tab-system" class="HuiTab">
                <div class="tabBar cl">
                    <span>基本设置</span>
                    <span>安全设置</span>
                    <span>邮件设置</span>
                    <span>其他设置</span>
                </div>
                <div class="tabCon">

                    <form class="form form-horizontal" action="{{route('admin.config.update')}}"  method="post"  enctype="multipart/form-data">
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">
                                网站名称：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <input type="text"  name="site_name"  value="{{$config['site_name']}}" class="input-text">
                            </div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">
                                标题：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <input type="text"  name="site_title"  value="{{$config['site_title']}}" class="input-text">
                            </div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">
                                关键词：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <input type="text" name="site_keywords"  value="{{$config['site_keywords']}}" class="input-text">
                            </div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">
                                描述：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <textarea name="site_description" class="textarea">{{$config['site_description']}}</textarea>

                            </div>
                        </div>

                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">
                                座机：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <input type="text"  name="phone"  value="{{$config['phone']}}" class="input-text">
                            </div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">
                                手机：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <input type="text"  name="mobile"  value="{{$config['mobile']}}" class="input-text">
                            </div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">
                                QQ：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <input type="text"  name="qq"  value="{{$config['qq']}}" class="input-text">
                            </div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">
                                地址：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <input type="text"  name="address"  value="{{$config['address']}}" class="input-text">
                            </div>
                        </div>

                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">
                                底部版权信息：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <input type="text" name="copyright"  value="{{$config['copyright']}}" class="input-text">
                            </div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">备案号：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <input type="text" name="case_number" value="{{$config['case_number']}}" class="input-text">
                            </div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">
                                官网：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <input type="text"  name="website"  value="{{$config['website']}}" class="input-text">
                            </div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">LOGO：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <img style="max-height: 100px; background: #ffffff; display: block" id="logo" src="{{$config['logo']}}">
                                <span class="btn-upload">
                                <input class="input-text" style="display: none" type="text"  readonly="">
                                 <a href="javascript:void();" style="width: 100px" class="btn btn-default"><i class="Hui-iconfont"></i> 浏览文件</a>
                                 <input type="file" multiple="" id="logo1" name="logo" value="" class="input-file ">
                                </span>
                                @if ($errors->any())
                                    @foreach ($errors->get('logo') as $error)
                                        <p class="c-red size-S">{{ $error }}</p>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">公众号：</label>
                            <div class="formControls col-xs-8 col-sm-7">
                                <img style="max-height: 100px; background: #ffffff; display: block" id="wechat" src="{{$config['wechat']}}">
                                <span class="btn-upload">
                                <input class="input-text" style="display: none" type="text"  readonly="">
                                 <a href="javascript:void();" style="width: 100px" class="btn btn-default"><i class="Hui-iconfont"></i> 浏览文件</a>
                                <input type="file" multiple="" id="wechat1" name="wechat" value="" class="input-file ">
                                </span>
                                @if ($errors->any())
                                    @foreach ($errors->get('wechat') as $error)
                                        <p class="c-red size-S">{{ $error }}</p>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        <div class="row cl">
                            <div class="col-xs-8 col-sm-7 col-xs-offset-4 col-sm-offset-2 btn-group">
                                <button  class="btn btn-default radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
                                <a class="btn btn-default radius"  href="{{route('admin.welcome')}}">取消</a>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="tabCon">
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">允许访问后台的IP列表：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <textarea class="textarea" name="" id=""></textarea>
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">后台登录失败最大次数：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="5" id="" name="" >
                        </div>
                    </div>
                </div>
                <div class="tabCon">
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">邮件发送模式：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text"  class="input-text" value="" id="" name="">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">SMTP服务器：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" id="" value="" class="input-text">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">SMTP 端口：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="25" id="" name="" >
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">邮箱帐号：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" class="input-text" value="5" id="emailName" name="emailName" >
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">邮箱密码：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="password" id="email-password" value="" class="input-text">
                        </div>
                    </div>
                    <div class="row cl">
                        <label class="form-label col-xs-4 col-sm-2">收件邮箱地址：</label>
                        <div class="formControls col-xs-8 col-sm-9">
                            <input type="text" id="email-address" value="" class="input-text">
                        </div>
                    </div>
                </div>

                <div class="tabCon">
                    <form class="form form-horizontal mt-20" method="get" action="{{route('admin.lang')}}" >
                        <div class="row cl">
                            <label class="form-label col-xs-4 col-sm-2">内容录入语言：</label>
                            <div class="formControls col-xs-8 col-sm-9">
                                <label >中文：</label><input  type="radio" @if($lang=="cn") checked @endif value="cn" name="lang">
                                <label class="ml-30">英文：</label><input    @if($lang=="en") checked @endif  type="radio"  value="en" name="lang">
                            </div>
                        </div>
                        <div class="row cl">
                            <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2 mt-50">
                                <div class="btn-group">
                                    <button  class="btn btn-default radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 保存</button>
                                    <a class="btn btn-default radius"  href="{{route('admin.welcome')}}">取消</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

    </div>
@endsection
