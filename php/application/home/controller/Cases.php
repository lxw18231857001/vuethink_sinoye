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
//use app\home\model\Cases as Test;
class Cases extends Base
{
    //案例列表(暂时不用)
    public function index()
    {
        $data = Db::name('cases')->select();
        return resultArray(['data' => $data]);
    }

    //案例详情（三级页面用）
    public function caseInfo()
    {
        $param = $this->param;
        if ($param['id']) {
            $data = db::name('cases')->where(['id' => $param['id']])->find();
        }
        return resultArray(['data' => $data]);
    }

    //案例分类
    public function caseType()
    {


        $param = $this->param;
        if ($param['id'] == '1') {
            $data = Db::name('cases')->select();
        } else {
            $data = Db::name('cases')->where(['pid' => $param['id']])->select();
        }
        return resultArray(['data' => $data]);
    }
//    public function caseType()
//    {
//        $param=$this->param;
//        $data=Db::name('cases')
//            ->alias('a')
//            ->where(['a.pid'=>$param['pid']])
//            ->join('__CASE_TYPE__ ct','a.pid = ct.id')
//            ->field('a.*, ct.name as t_name')
//            ->select();
////        p($data);
//        return resultArray(['data'=>$data]);
//    }


    //分类名称
    public function caseName()
    {
        $data = Db::name('case_type')->where(['status' => 1])->select();
        return resultArray(['data' => $data]);
    }

    //尽管动态查询方法的参数支持查询表达式，但不要比较或范围表达式，因为仅返回第一条满足条件记录，通常是没有意义的。
    //模糊查询有时很有用，但同样也仅获取结果集的首条记录
    //    public function caseGetId()
    //    {
    //        $result = Test::getByTitle(['like','%门%']);
    //        $data = $result ->getData( );
    //        return resultArray(['data'=>$data]);
    //    }
    //    public function today($month='12',$year='2017')
    //    {
    //        return 'year='.$year.'&&month='.$month;
    //    }

    public function test()
    {
//        $param =    Request::instance()->header();
//        session_start();
//        $id=session_id();
////        PHPSESSID=viuoii8dh0buirvl9d3rgm49l2
////        p($id);
//        $str=md5('sinoye_new_2017');
//        p($str);
    }
}