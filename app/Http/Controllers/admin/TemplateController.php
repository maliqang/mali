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

use App\model\Templates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PhpMyAdmin\Response;


class TemplateController extends AdminController
{
    /**
     * 模板列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Templates $templatesModel)
    {

        $template=$templatesModel->where(['lang'=>$this->admin_lang,'type'=>1])->get();

        return response()->view('admin.template.index',['template'=>$template]);
    }

    /**创建HTML模板表单
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function createHtml(){
        return response()->view('admin.template.create_html');
    }

    /**保存HTML模板
     * @param Request $request
     * @param Templates $templatesModel
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function storeHtml(Request $request,Templates $templatesModel){
        $template_path=$this->getTemplatePath($request->post('public'),$request->post('model'),$request->post('class'),$request->post('theme'));
        //完整模板目录
        $template_intact_path=resource_path("views/".$template_path);
        if ($request->hasFile('file')){
            $template_name=explode(".",$request->file->getClientOriginalName())[0];
            if(is_file($template_intact_path."/".$template_name)){
                return redirect(route('admin.template.create_html'))->with('status_file', '模板文件已存');
            }
            $template_path_name=$request->file->storeAs($template_path,$request->file->getClientOriginalName(),'views');
        }

        //没有模板文件上传则创建空模板
        if(!$request->hasFile('file')){

            $validatedData = $request->validate(
                [
                    'name'=>'required|regex:/^[0-9a-zA-Z_-]{1,}$/',                        //正则验证由数字或者字母上划线下划线组的字符或字符串
                ],
                [
                    'name.regex'=>'模板名称不正确',
                    'name.required'=>"模板名称不能为空"

                ]
            );
            $template_name=$validatedData['name'];
            $template_path_name=$template_path."/".$template_name.".blade".".php";

            if(!is_dir($template_intact_path)){
                File::makeDirectory($template_intact_path,777,true);
            }

            $template_intact_path_name=resource_path("views/".$template_path_name);
            if(is_file($template_intact_path_name)){
                return redirect(route('admin.template.create_html'))->with('status_name', '模板文件已存在');
            }
            File::put($template_intact_path_name,"");
        }

        $templatesModel['model']=$request->post('model');
        $templatesModel['class']=$request->post('class');
        $templatesModel['remark']=$request->post('remark');
        $templatesModel['theme']=$request->post('theme');
        $templatesModel['name']=$template_name;
        $templatesModel['lang']=$this->admin_lang;
        $templatesModel['type']=1;
        $templatesModel['path']=$template_path."/".$template_name.".blade.php";
        if($templatesModel->save()){
            return response()->redirectTo(route('admin.template'));
        }


    }

    /**编辑HTML模板表单
     * @return \Illuminate\Http\Response
     */
    public function editHtml(Request $request,Templates $templatesModel){
        $id=$request->get('id');
        $template=$templatesModel->find($id);
        $path=resource_path('views/'.$template->path);
        $html=File::get($path);
        return response()->view('admin.template.edit_html',['template'=>$template,'content'=>$html]);
    }

    /**CSS列表
     * @param Templates $templatesModel
     * @return \Illuminate\Http\Response
     */
    public function cssList(Templates $templatesModel){
        $css=$templatesModel->where(['lang'=>$this->admin_lang,'type'=>2])->get();
        return response()->view('admin.template.css',['css'=>$css]);
    }

    /**创建CSS表单
     * @return \Illuminate\Http\Response
     */
    public function createCss(){
        return response()->view('admin.template.create_css');
    }

    public function storeCss(Request $request,Templates $templatesModel){
        $css_path="css/".$request->post('theme')."/".$this->admin_lang;
        $css_intact_path=public_path($css_path);
        if($request->hasFile('file')){
            $css_name=explode('.',$request->file->getClientOriginalName())[0];
            if(is_file($css_intact_path."/".$request->file->getClientOriginalName())){
                return redirect(route('admin.template.create_css'))->with('status_file', 'CSS文件已存在');
            }
            $css_path_name=$request->file->storeAs($css_path,$request->file->getClientOriginalName(),'public');
        }else{
            $css_name = $request->validate(
                [
                    'name'=>'required|regex:/^[0-9a-zA-Z_-]{1,}$/',                        //正则验证由数字或者字母上划线下划线组的字符或字符串
                ],
                [
                    'name.regex'=>'CSS名称不正确',
                    'name.required'=>"CSS名称不能为空"

                ])['name'];
           if(is_file( $css_intact_path."/".$css_name.".css")){
               return redirect(route('admin.template.create_css'))->with('status_name', '样式文件已存在');
           }
           File::put($css_intact_path."/".$css_name.".css","");

        }
        $templatesModel['theme']=$request->post('theme');
        $templatesModel['name']=$css_name;
        $templatesModel['lang']=$this->admin_lang;
        $templatesModel['type']=2;
        $templatesModel['remark']=$request->post('remark');
        $templatesModel['path']=$css_path."/".$css_name.".css";
        if($templatesModel->save()){
            return response()->redirectTo(route('admin.template.css'));
        }
    }

    public function jsList(){
        return 'js';
    }


    /**更新文件内容
     * @param Request $request
     * @param Templates $templatesModel
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateFile(Request $request,Templates $templatesModel){
        $id=$request->get('id');
        $html=$request->post('content');
        $template=$templatesModel->find($id);
        $path=resource_path('views/'.$template->path);
        File::put($path,$html);
        $templatesModel->where(['id'=>$id])->update(['remark'=>$request->post('remark')]);
        return response()->redirectToRoute('admin.template');
    }
}
