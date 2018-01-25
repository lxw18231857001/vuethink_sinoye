<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/28
 * Time: 13:58
 */
function getDataList($keywords)
{
    $map = [];
    if ($param['keywords']) {
        $map['name'] = ['like', '%'.$keywords.'%'];
    }
    $data = $this->where($map)->order(['order'])->select();
    return $data;
}