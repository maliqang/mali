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
// | purpose: 栏目
// +----------------------------------------------------------------------
namespace App\Http\Controllers\Admin;

use App\model\Columns;
use App\model\Templates;
use Illuminate\Http\Request;


class ColumnController extends AdminController
{

    /** 显示列表
     * @param Columns $columnModel
     * @return \Illuminate\Http\Response
     */
    public function index(Columns $columnModel)
    {
        $list=$columnModel->getAllTree($this->admin_lang);
        return response()->view('admin.column.index',['list'=>$list]);
    }

    /**
     * 创建栏目表单
     * @return \Illuminate\Http\Response
     */
    public function create(Columns $columnsModel)
    {
        $columnTree=$columnsModel->getAllTree($this->admin_lang,1);
       
        return response()->view('admin.column.create',['column_tree'=>$columnTree,'id'=>0]);
    }

    /**
     * 保存
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Columns $columnsModel)
    {
        $validatedData = $request->validate(
            [
                'name'=>'required'
            ],
            [
                'name.required'=>'栏目名称不允许为空',
            ]
        );


       foreach ( $request->post() as $k=>$v){
           if($v!=""){
              $columnsModel->$k=$v;
           }
       }
       $columnsModel->lang=$this->admin_lang;
       if($columnsModel->save()){
           return response()->redirectToRoute('admin.column');
       }
    }

    /**
     * 编辑
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Columns $columnsModel,Templates $templatesModel,$id)
    {
        $column=$columnsModel->find($id);
        $columnTree=$columnsModel->getAllTree($this->admin_lang);
        $template=$templatesModel->getBladeModelList($this->getTrueModelValue($column['model']),$this->admin_lang);
        return response()->view('admin.column.edit',['column'=>$column,'column_tree'=>$columnTree,'template'=>$template]);
    }

    /**
     * 更新
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Columns $columnsModel, $id)
    {
        $validatedData = $request->validate(
            [
                'name'=>'required',
                'img'=>"image"
            ],
            [
                'name.required'=>'栏目名称不允许为空',
                'img.image'=>"必须是jpeg, png, bmp, gif, svg图片格式",
                'img.size'=>"图片不能在于1024KB"
            ]
        );

        $columns=$columnsModel->find($id);
        foreach ( $request->post() as $k=>$v){
            if($v!=""){
                $columns->$k=$v;
            }
        }
        //缩略图 上传

        if ($request->hasFile('img')) {
            $img_path = $request->file("img")->store('image/column', "public");
            $columns->image="/".$img_path;
        }

        if($columns->save()){
            return response()->redirectToRoute('admin.column');
        }
    }

    /**
     * 删除
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Columns $columnsModel)
    {
        $msg="";
        $result=$columnsModel->find($id);
        if($result->delete()){
            $msg=['status'=>1,"result"=>"已删除"];
        }else{
            $msg=['status'=>0,"result"=>"删除失败"];
        }
        return response()->json($msg);
    }

    /**新建子栏目
     * @param Request $request
     * @param Columns $columnsModel
     * @return \Illuminate\Http\Response
     */
    public function createSon(Request $request,Columns $columnsModel){
        $columnTree=$columnsModel->getAllTree($this->admin_lang,1);
        $id=$request->get('id');
        return response()->view('admin.column.create',['id'=>$id,'column_tree'=>$columnTree]);
    }


    /**w创建内容表单
     * @param Request $request
     */
    public function createContent(Request $request,Columns $columnsModel,$id){
        $column=$columnsModel->find($id);
        return response()->view('admin.column.create_content',['column'=>$column]);
    }

    /**排序
     * @param Request $request
     * @param Columns $columnsModel
     * @return \Illuminate\Http\JsonResponse
     */
    public function sort(Request $request,Columns $columnsModel){
        $msg=[];
        if($columnsModel->where(["id"=>$request->get('id')])->update(['sort'=>$request->get('sort')])){
            $msg=['status'=>1,'ms'=>"OK"];
        }else{
            $msg=['status'=>0,'msg'=>"NO"];
        }

        return response()->json($msg);
    }

    /**更新状态
     * @param Request $request
     * @param Columns $columnsModel
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(Request $request,Columns $columnsModel){
        $msg=[];
        if($columnsModel->where(["id"=>$request->get('id')])->update(['status'=>$request->get('value')])){
            $msg=['status'=>1,'ms'=>"OK"];
        }else{
            $msg=['status'=>0,'msg'=>"NO"];
        }

        return response()->json($msg);
    }

    /**更新是否导航
     * @param Request $request
     * @param Columns $columnsModel
     * @return \Illuminate\Http\JsonResponse
     */
    public function isNav(Request $request,Columns $columnsModel){
        $msg=[];
        if($columnsModel->where(["id"=>$request->get('id')])->update(['is_nav'=>$request->get('value')])){
            $msg=['status'=>1,'ms'=>"OK"];
        }else{
            $msg=['status'=>0,'msg'=>"NO"];
        }

        return response()->json($msg);
    }


    protected function  getTrueModelValue($value){

            $model=[
                 0=>0,
                "文章"=>1,
                "产品"=>2,
                "图片"=>3,
                "视频"=>4,
                "单页"=>5,
                "模块"=>6,
            ];

            return $model[$value];
    }

}
