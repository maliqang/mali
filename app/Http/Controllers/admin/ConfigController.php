<?php
// +----------------------------------------------------------------------
// | MS
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2030
// +----------------------------------------------------------------------
// | WeChat:m18312476724
// +----------------------------------------------------------------------
// | QQ:459157537
// +----------------------------------------------------------------------
// | Author: mali
// +----------------------------------------------------------------------
// | Date time: 2019/9/17 16:09
// +----------------------------------------------------------------------
// | purpose: 配置信息
// +----------------------------------------------------------------------
namespace App\Http\Controllers\Admin;

use App\Model\Configs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ConfigController extends AdminController
{
    public function index(Configs $configs){

        $config=$configs->where(['lang'=>$this->admin_lang])->pluck('value','key');
        return view('admin.config',["config"=>$config,'lang'=>$this->admin_lang]);

    }

    /**更新配置信息
     * @param Request $request
     * @param Configs $configs
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,Configs $configs){

        $validatedData = $request->validate(
            [
                'wechat'=>'image|size:1024',
                'logo'=>"image|size:1024"
            ],
            [
                'wechat.image'=>"必须是jpeg, png, bmp, gif, svg图片格式",
                'logo.image'=>"必须是jpeg, png, bmp, gif, svg图片格式",
                'wechat.size'=>"图片不能大于1024KB",
                'logo.size'=>"图片不能大于1024KB"
            ]
        );

          $config=$request->post();
          foreach ($config as $k=>$v){
              $configs->where(['key'=>$k])->update(['value'=>$v]);
          }


        //LOGO 上传
        if ($request->hasFile('logo')) {
            $logo_path = $request->file("logo")->store('image/system', "public");
            $configs->where(['key' => 'logo'])->update(['value' => "/" . $logo_path]);

        }


        // 公从号上传
        if ($request->hasFile('wechat')) {
            $wechat_path = $request->file("wechat")->store('image/system', "public");
            $configs->where(['key' => 'wechat'])->update(['value' => "/" . $wechat_path]);
        }

        return response()->redirectTo(route('admin.welcome'));
    }

    /**内容录入语言
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function lang(Request $request){
        $lang= $request->get('lang');
        $lang_cookie=Cookie::forever('lang', $lang);
        return response()->redirectTo(route('admin.welcome'))->cookie($lang_cookie);
    }

    /**欢迎页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function welcome(){
        return view('admin.welcome');
    }
    
}
