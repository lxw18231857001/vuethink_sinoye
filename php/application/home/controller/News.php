<?php
/**
 * Created by PhpStorm.
 * User: lxw
 * Date: 2017/12/8
 * Time: 10:37
 */

namespace app\home\controller;

use think\Db;
use think\Request;
use think\db\Query;

class News extends Base
{
    //观点动态列表
    public function index()
    {
        $newsModel = model('News');
        $param = $this->param;
        $page = !empty($param['page']) ? $param['page'] : '';
        $limit = !empty($param['limit']) ? $param['limit'] : '';
        $data = $newsModel->getDataList($page, $limit);
        return resultArray(['data' => $data]);
    }

    //观点动态详情
    public function newsDetails()
    {
        $param = $this->param;
        $data = Db::name('news')->where(['id' => $param['id']])->find();
        return resultArray(['data' => $data]);

    }


}