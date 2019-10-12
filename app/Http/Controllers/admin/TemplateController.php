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
// | purpose: 模板
// +----------------------------------------------------------------------
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class TemplateController extends AdminController
{
    /**
     * 模板列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.template.index');
    }

    /**创建HTML模板表单
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createHtml(){
        return view('admin.template.create_html');
    }

    public function cssList(){
        return 'css';
    }

    public function jsList(){
        return 'js';
    }


    public function store(Request $request){
        $template_path=$this->getTemplatePath($request->post('public'),$request->post('model'),$request->post('class'),$request->post('theme'));
        //完整模板目录
        $template_intact_path=resource_path("views/".$template_path);
        if ($request->hasFile('file')){
            $template_name=$request->file->getClientOriginalName();
            if(is_file($template_intact_path."/".$template_name)){
                return redirect(route('admin.template.create_html'))->with('status_file', '模板文件已存');
            }
           $template_path_name=$request->file->storeAs($template_path,$request->file->getClientOriginalName(),'views');
        }

        //没有模板文件上传则创建空模板
        if(!$request->hasFile('file')){

            $validatedData = $request->validate(
                [
                    'name'=>'regex:/^[0-9a-zA-Z_-]{0,}$/',                        //正则验证由数字或者字母上划线下划线组的字符或字符串
                ],
                [
                    'name.regex'=>'模板名称不正确',
                ]
            );
            $template_name=$validatedData['name'].".blade".".php";
            $template_path_name=$template_path."/".$template_name;

             if(!is_dir($template_intact_path)){
                File::makeDirectory($template_intact_path,777,true);
             }

            $template_intact_path_name=resource_path("views/".$template_path_name);
             if(is_file($template_intact_path_name)){
                 return redirect(route('admin.template.create_html'))->with('status_name', '模板名称已存');
             }
            File::put($template_intact_path_name,"");
        }

        $template=$request->post();
        $template['name']=$template_name;
        $template['lang']=$this->admin_lang;
        $template['type']=1;
        $template['path']=$template_path;
        dd($template);

    }
}
