<?php

use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *style 1=文本  2=文本域   3=图片
     * @return void
     */

    public function run()
    {

        DB::table('configs')->delete();


        DB::table('configs')->insert(array (
            [
                'id'               => 1,
                'key'              => 'site_name',
                'value'            => '希立仪器',
                'desc'             => "网站名称",
                'remarks'          => NULL,
                'lang'             =>"cn",
                'style'            =>1,
                'created_at'       => date('Y-m-d H:i:s',time()),
                'updated_at'       => date('Y-m-d H:i:s',time()),
                'type'             =>"system"
            ]
        ,
            [
                'id'               => 2,
                'key'              => 'site_title',
                'value'            => '希立仪器设备有限公司',
                'desc'             => "网站标题",
                'remarks'          => NULL,
                'lang'             =>"cn",
                'style'            =>1,
                'created_at'       => date('Y-m-d H:i:s',time()),
                'updated_at'       => date('Y-m-d H:i:s',time()),
                'type'             =>"system"
            ]
        ,
            [
                'id'               => 3,
                'key'              => 'site_keywords',
                'value'            => '气密性检测仪',
                'desc'             => "关键词",
                'remarks'          => NULL,
                'lang'             =>"cn",
                'style'            =>1,
                'created_at'       => date('Y-m-d H:i:s',time()),
                'updated_at'       => date('Y-m-d H:i:s',time()),
                'type'             =>"system"
            ]
        ,
            [
                'id'               => 4,
                'key'              => 'site_description',
                'value'            => '关于希立仪器设备有限公司',
                'desc'             => "描述",
                'remarks'          => NULL,
                'lang'             =>"cn",
                'style'            =>2,
                'created_at'       => date('Y-m-d H:i:s',time()),
                'updated_at'       => date('Y-m-d H:i:s',time()),
                'type'             =>"system"
            ]
        ,
            [
                'id'               => 5,
                'key'              => 'phone',
                'value'            => '400-168-1023',
                'desc'             => "座机",
                'remarks'          => NULL,
                'lang'             =>"cn",
                'style'            =>1,
                'created_at'       => date('Y-m-d H:i:s',time()),
                'updated_at'       => date('Y-m-d H:i:s',time()),
                'type'             =>"system"
            ]
        ,
            [
                'id'               => 6,
                'key'              => 'mobile',
                'value'            => '13123705900',
                'desc'             => "手机",
                'remarks'          => NULL,
                'lang'             =>"cn",
                'style'            =>1,
                'created_at'       => date('Y-m-d H:i:s',time()),
                'updated_at'       => date('Y-m-d H:i:s',time()),
                'type'             =>"system"
            ]
        ,
            [
                'id'               => 7,
                'key'              => 'address',
                'value'            => '深圳市光明新区公明北环大道世峰工业园B栋',
                'desc'             => "地址",
                'remarks'          => NULL,
                'lang'             =>"cn",
                'style'            =>2,
                'created_at'       => date('Y-m-d H:i:s',time()),
                'updated_at'       => date('Y-m-d H:i:s',time()),
                'type'             =>"system"
            ]
        ,
            [
                'id'               =>8,
                'key'              => 'qq',
                'value'            => '2391656270',
                'desc'             => "QQ",
                'remarks'          => NULL,
                'lang'             =>"cn",
                'style'            =>1,
                'created_at'       => date('Y-m-d H:i:s',time()),
                'updated_at'       => date('Y-m-d H:i:s',time()),
                'type'             =>"system"
            ]
        ,
            [
                'id'               =>9,
                'key'              => 'wechat',
                'value'            => '2',
                'desc'             => "公众号",
                'remarks'          => NULL,
                'lang'             =>"cn",
                'style'            =>3,
                'created_at'       => date('Y-m-d H:i:s',time()),
                'updated_at'       => date('Y-m-d H:i:s',time()),
                'type'             =>"system"
            ]
        ,
            [
                'id'               =>10,
                'key'              => 'email',
                'value'            => 'liao@seals-ins.com',
                'desc'             => "邮箱",
                'remarks'          => NULL,
                'lang'             =>"cn",
                'style'            =>1,
                'created_at'       => date('Y-m-d H:i:s',time()),
                'updated_at'       => date('Y-m-d H:i:s',time()),
                'type'             =>"system"
            ]
        ,
            [
                'id'               =>11,
                'key'              => 'website',
                'value'            => 'www.seals-ins.com',
                'desc'             => "官网",
                'remarks'          => NULL,
                'lang'             =>"cn",
                'style'            =>1,
                'created_at'       => date('Y-m-d H:i:s',time()),
                'updated_at'       => date('Y-m-d H:i:s',time()),
                'type'             =>"system"
            ]
        ,
            [
                'id'               =>12,
                'key'              => 'case_number',
                'value'            => '粤ICP备18027543号-1',
                'desc'             => "备案号",
                'remarks'          => NULL,
                'lang'             =>"cn",
                'style'            =>1,
                'created_at'       => date('Y-m-d H:i:s',time()),
                'updated_at'       => date('Y-m-d H:i:s',time()),
                'type'             =>"system"
            ]
        ,
            [
                'id'               =>13,
                'key'              => 'logo',
                'value'            => '',
                'desc'             => "LOGO",
                'remarks'          => NULL,
                'lang'             =>"cn",
                'style'            =>3,
                'created_at'       => date('Y-m-d H:i:s',time()),
                'updated_at'       => date('Y-m-d H:i:s',time()),
                'type'             =>"system"
            ]
        ,
            [
                'id'               =>14,
                'key'              => 'copyright',
                'value'            => '流年如梦',
                'desc'             => "版权",
                'remarks'          => NULL,
                'lang'             =>"cn",
                'style'            =>1,
                'created_at'       => date('Y-m-d H:i:s',time()),
                'updated_at'       => date('Y-m-d H:i:s',time()),
                'type'             =>"system"
            ]
        ));
    }
}
