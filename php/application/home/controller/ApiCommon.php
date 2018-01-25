<?php
/**
 * Created by PhpStorm.
 * User: lxw
 * Date: 2017/12/22
 * Time: 10:47
 * 客户端请求前(签名算法暂时不能用，后续添加)
 */
namespace app\home\controller;
use think\Request;
use app\common\controller\Common;

class ApiCommon extends Common
{
    const TOKEN = 'API';
    public function _initialize()
    {
        parent::_initialize();
        $this->getDataFromServer();
    }
    //模拟前台请求服务器api接口
    public function getDataFromServer(){
        //时间戳
        $timeStamp = time();
        //随机数
        $randomStr = $this -> createNonceStr();
        //生成签名
        $signature = $this -> arithmetic($timeStamp,$randomStr);
        //url地址
        $request = Request::instance();
        $hostUrl=$request->url(true);
//        p($hostUrl);
        $url = $hostUrl."/t/{$timeStamp}/r/{$randomStr}/s/{$signature}";
        dump($url);
//        return $url;
    }

    //随机生成字符串
    private function createNonceStr($length = 8) {
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        }
        return "z".$str;
    }

    /**
     * @param $timeStamp 时间戳
     * @param $randomStr 随机字符串
     * @return string 返回签名
     */
    private function arithmetic($timeStamp,$randomStr){
        $arr['timeStamp'] = $timeStamp;
        $arr['randomStr'] = $randomStr;
        $arr['token'] = self::TOKEN;
        //按照首字母大小写顺序排序
        sort($arr,SORT_STRING);
        //拼接成字符串
        $str = implode($arr);
        //进行加密
        $signature = sha1($str);
        $signature = md5($signature);
        //转换成大写
        $signature = strtoupper($signature);
        return $signature;
    }
}