<?php
/**
 * Created by PhpStorm.
 * User: lxw
 * Date: 2017/11/29
 * Time: 16:41
 */

namespace app\home\controller;

use think\Db;
use think\Request;
class AboutUs extends Base
{
    //叶晟荣介绍
    public function index()
    {
        $data=Db::name('about_us')->where(['group'=>'first'])->select();
        return resultArray(['data'=>$data]);
    }

    //我们中间banner
    public function banner()
    {
        $data=Db::name('about_us')->where(['group'=>'second'])->select();
        return resultArray(['data'=>$data]);   
    }

    // 我们的优势
    public function advandages()
    {
        $data=Db::name('about_us')->where(['group'=>'three'])->select();
        return resultArray(['data'=>$data]);
    }
    // 我们的团队
    public function team()
    {
        $data=Db::name('about_us')->where(['group'=>'four'])->select();
        return resultArray(['data'=>$data]);
    }
    //轮播长图
    public function slider()
    {
        $data=Db::name('about_us')->where(['group'=>'five'])->select();
        return resultArray(['data'=>$data]);
    }



}