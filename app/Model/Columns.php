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
// | Date time: 2019/10/19 16:09
// +----------------------------------------------------------------------
// | purpose: 栏目
// +----------------------------------------------------------------------
namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Columns extends Model
{
    use SoftDeletes;
    public function getAllTree($lang="cn",$status=null){
        if($status!=null){
            $column=$this->where(['lang'=>$lang,'status'=>$status])->select(['id','pid','name','status','updated_at','is_nav','sort'])->get()->toArray();
        }else{
            $column=$this->where(['lang'=>$lang])->get()->toArray();
        }
        return get_tree($column);
    }
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
    public function getUpdatedAtAttribute($value)
    {
        return date('Y-m-d H:i', strtotime($value));
    }
}
