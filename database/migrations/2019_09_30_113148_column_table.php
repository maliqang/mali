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
// | purpose: 栏目
// +----------------------------------------------------------------------
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ColumnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('columns',function (Blueprint $table){

            $table->bigIncrements('id');
            $table->smallInteger('pid')->nullable()->unsigned()->default(0)->comment('父ID');
            $table->timestamps();
            $table->softDeletes();
            $table->string('name',30)->comment('名称');
            $table->string('title',140)->nullable()->comment('标题');
            $table->string('keyword',160)->nullable()->comment('关键词');
            $table->string('description',240)->nullable()->comment('描述');
            $table->string('url',250)->nullable()->comment('超连接');
            $table->smallInteger('status',false,true)->nullable()->default(0)->comment('状态 0审核 1通过');
            $table->smallInteger('position',false,true)->nullable()->default(1)->comment('位置');
            $table->smallInteger('sort',false,true)->nullable()->default(1)->comment('排序');
            $table->smallInteger('model',false,true)->nullable()->comment('模型');
            $table->smallInteger('is_nav',false,true)->nullable()->default(0)->comment("是否导航  0不是，1是");
            $table->smallInteger('detailed_template_id',false,true)->nullable()->comment("详情模板ID");
            $table->smallInteger('list_template_id',false,true)->nullable()->comment("列表模板ID");
            $table->smallInteger('channel_template_id',false,true)->nullable()->comment("频道模板ID");
            $table->smallInteger('single_template_id',false,true)->nullable()->comment("单页模板ID");
            $table->smallInteger('page',false,true)->nullable()->default(12)->comment('分页');
            $table->float('priority',3,2)->unsigned()->nullable()->default(0.8)->comment('权重');
            $table->string('rel',100)->nullable();
            $table->string('alt',100)->nullable();
            $table->string('image',200)->comment('图片')->nullable();
            $table->text('content')->comment('内容')->nullable();
            $table->string('lang',4)->default('cn')->comment("语言");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
