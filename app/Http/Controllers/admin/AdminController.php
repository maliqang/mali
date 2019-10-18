<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;


class AdminController extends Controller
{
    protected $admin_lang="cn";                                   //默认内容录入语言

    public function __construct()
    {

       $this->langInit();


    }


    protected function langInit(){                                        //  初始化
     if(Cookie::has('lang')){
         $this->admin_lang=Cookie::get('lang');
         }
    }


    /**组装HOME模块的模板路径
     * @param $public
     * @param null $model
     * @param null $class
     * @param string $theme
     * @return string
     */
    protected function getTemplatePath($public,$model=null,$class=null,$theme='default',$module="home"){
        $model_list=[
            0=>"",
            1=>'article',
            2=>'product',
            3=>'image',
            4=>'video',
            5=>"single",
            6=>"module",
        ];
        $class_list=[
            0=>"",
            1=>"list",
            2=>"details",
            3=>"channel",
        ];
       switch ($public){
           case 1:
               if($model==5||$model==6){
                   return $module."/".$theme."/".$this->admin_lang."/".$model_list[$model];

               }else{
                   return $module."/".$theme."/".$this->admin_lang."/".$model_list[$model]."/".$class_list[$class];

               }
            case 2;
                return $module."/".$theme."/".$this->admin_lang."/".'public';
       }


    }
}
