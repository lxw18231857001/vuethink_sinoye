<?php
/**
 * 首页内容获取
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/11/28
 * Time: 10:02
 */
namespace app\home\controller;
use think\Db;
use think\Request;

class Index extends Base
{

    //获取系统信息
    public function getSystem(){
        $system= Db::name('system_config')->select();
        return resultArray(['data' => $system]);
    }
    //获取导航信息
    public  function getNav(){
        $map['pid']=63;
        $nav= Db::name('admin_menu')->where($map)->select();
        return resultArray(['data' => $nav]);

    }
    //获取banner
    public function getBanner()
    {
        $data= Db::name('shou_ye')->where(['type'=>1])->select();
        return resultArray(['data' => $data]);
    }
    //获取中部数字部分
    public function getNum()
    {
        $data= Db::name('shou_ye')->where(['type'=>3])->select();
        return resultArray(['data' => $data]);
    }
    //获取视频链接
    public function getVideo()
    {
        $data= Db::name('shou_ye')->where(['type'=>0])->field('url')->find();
        return resultArray(['data' => $data]);
    }

    //获取视频信息
    public function getVideoInfo()
    {
        $data= Db::name('shou_ye')->where(['type'=>0])->field('content')->select();
        return resultArray(['data' => $data]);
    }

    //获取页脚标题
    public function getFootTitle()
    {
        $data= Db::name('shou_ye')->where(['type'=>2])->select();
        return resultArray(['data' => $data[0]]);
    }
    //获取页脚电话
    public function getFootTel()
    {
        $data= Db::name('shou_ye')->where(['type'=>2])->select();
        return resultArray(['data' => $data[1]]);
    }

    //获取推送的项目案例-轮播
    public function getCasesSlider()
    {
        $data= Db::name('cases')->where(['status'=>1])->field('content,create_time,type',true)->select();
        return resultArray(['data' => $data]);
    }
    //获取推送的项目案例-右上
    public function getCasesRight()
    {
        $data= Db::name('cases')->where(['status'=>2])->field('content,create_time,type',true)->select();
        return resultArray(['data' => $data]);
    }
    //获取推送的项目案例-底部
    public function getCasesBottom()
    {
        $data= Db::name('cases')->where(['status'=>3])->field('content,create_time,type',true)->select();
        return resultArray(['data' => $data]);
    }

    //获取公司总.分部信息
    public function getCompany()
    {
        $data= Db::name('contact')->where(['type'=>1])->field('backimage,create_time',true)->select();
        return resultArray(['data' => $data]);
    }
    //获取观点动态
    public function getNews()
    {
        $data= Db::name('news')->where(['status'=>1])->field('listpic',true)->select();
        $newData=array();
        foreach ($data as $vo){
            $content=mb_substr($vo['content'],0,150,'utf-8');
            $vo['content']=$content.'...';
            $newData[]=$vo;
        }
        return resultArray(['data' => $newData]);
    }

}