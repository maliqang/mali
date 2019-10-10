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
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('templates',function (Blueprint $table){

            $table->bigIncrements('id');
            $table->string('name',60)->comment('名称');
            $table->smallInteger('class',false,true)->nullable()->comment('类型');
            $table->smallInteger('model',false,true)->nullable()->comment("模型");
            $table->smallInteger('type',false,true)->nullable()->comment('类别');
            $table->string('theme',40)->default('default')->nullable()->comment("主题");
            $table->string("path",120)->nullable()->comment('路径');
            $table->text('remark')->nullable()->comment("备注");
            $table->string('lang',4)->default('en')->nullable()->comment('语言');
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
