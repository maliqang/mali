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
// | Date time: 2019/10/24 17:30
// +----------------------------------------------------------------------
// | purpose: 函数
// +----------------------------------------------------------------------
/**
 * 无限级分类
 */
if(!function_exists('get_tree')){
    function get_tree($array, $pid =0, $level = 0,$isClear=true){
        static $list = [];                                                          //声明静态数组,避免递归调用时,多次声明导致数组覆盖
        if($isClear==true){                                                         //刚进入函数要清除上次调用此函数后留下的静态变量的值，进入深一层循环时则不要清除
            $list =array();
        }
        foreach ($array as $key => $value){                                         //第一次遍历,找到父节点为根节点的节点 也就是pid=0的节点
            if ($value['pid'] == $pid){                                             //父节点为根节点的节点,级别为0，也就是第一级
                $value['level'] = $level;
                $list[] = $value;                                                    //把数组放到list中
                unset($array[$key]);                                                 //把这个节点从数组中移除,减少后续递归消耗
                get_tree($array, $value['id'], $level+1,false);
            } }
        return $list;
    }
}
