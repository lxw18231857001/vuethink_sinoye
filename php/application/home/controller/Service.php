<?php
/**
 * Created by PhpStorm.
 * User: lxw
 * Date: 2017/11/29
 * Time: 16:29
 */

namespace app\home\controller;

use think\Db;

class Service extends Base
{
    //获取服务信息
    public function index()
    {
        $serviceInfo= Db::name('service')->select();
        return resultArray(['data' => $serviceInfo]);
    }
}