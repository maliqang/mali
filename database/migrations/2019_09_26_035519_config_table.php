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
// | purpose: 配置
// +----------------------------------------------------------------------
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('key',200)->nullable()->comment('配置健值');
            $table->string("desc",100)->comment("描述");
            $table->string('value',500)->nullable()->comment('值');
            $table->string('remarks',300)->nullable()->comment('备注');
            $table->smallInteger('style',false, true)->comment('样式-文本、文本域、图片、布尔、JSON');
            $table->string('type')->default('cn')->comment('类型');
            $table->string('lang')->default('cn')->nullable()->comment('多语言');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('config');
    }
}
