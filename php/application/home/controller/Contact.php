<?php
/**
 * Created by PhpStorm.
 * User: lxw
 * Date: 2017/12/8
 * Time: 17:41
 */

namespace app\home\controller;

use think\Db;
class Contact extends Base
{
    //获取总分公司信息
    public function index()
    {
        $data=DB::name('contact')->where(['type'=>1])->select();
        return resultArray(['data'=>$data]);
    }

    //中间横图
    public function middle()
    {
        $data=Db::name('contact')->where(['type'=>2])->select();
        return resultArray(['data'=>$data]);
    }
}