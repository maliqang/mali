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
// | Date time: 2019/9/30 16:09
// +----------------------------------------------------------------------
// | purpose: 模板
// +----------------------------------------------------------------------
namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Templates extends Model
{
    use SoftDeletes;
    /**获取模型
     * @param $value
     * @return mixed
     */
    public function  getModelAttribute($value){
        $model=[
            0=>"",
            1=>"文章",
            2=>"产品",
            3=>"图片",
            4=>"视频",
            5=>"单页",
            6=>"模块",
        ];

        return $model[$value];
    }

    /**获取分类
     * @param $value
     * @return mixed
     */
    public function getClassAttribute($value){
        $data=[
            0=>"",
            1=>"列表",
            2=>"详情",
            3=>"频道",
        ];

        return $data[$value];
    }

    /**根据模型获取模板列表
     * @param $model
     * @param int $class
     * @param string $lang
     * @return mixed
     */
    public function getBladeModelList($model,$lang='cn'){
      return  $this->where(['model'=>$model,"lang"=>$lang,"type"=>1,])->select(['id','name','path','class','model'])->get();
    }



    public function getCreatedAtAttribute($value)
    {
        return date('Y-m-d H:i', strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date('Y-m-d H:i', strtotime($value));
    }


}
