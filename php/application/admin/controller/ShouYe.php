<?php
// +----------------------------------------------------------------------
// | Description: 首页信息设置
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;

class ShouYe extends ApiCommon
{
    //get:获取首页信息列表
    public function index()
    {
        $shouYeModel = model('ShouYe');
        $param = $this->param;
        $keywords = !empty($param['keywords']) ? $param['keywords']: '';
        $page = !empty($param['page']) ? $param['page']: '';
        $limit = !empty($param['limit']) ? $param['limit']: '';
        $data = $shouYeModel->getDataList($keywords, $page, $limit);
        return resultArray(['data' => $data]);
    }

    //get: 通过ID获取首页信息的详细信息
    public function read()
    {
        $shouYeModel = model('ShouYe');
        $param = $this->param;
        $data = $shouYeModel->getDataById($param['id']);
        if (!$data) {
            return resultArray(['error' => $shouYeModel->getError()]);
        }
        return resultArray(['data' => $data]);
    }

    //post:添加首页信息
    public function save()
    {
        $shouYeModel = model('ShouYe');
        $param = $this->param;
        if($param['banner']){
            $param['banner']=addSeverPath($param['banner']);
        }else{
            $param['banner']= '';
        }
        $data = $shouYeModel->createData($param);
        if (!$data) {
            return resultArray(['error' => $shouYeModel->getError()]);
        }
        return resultArray(['data' => '添加成功']);
    }

    //put:() 修改首页信息
    public function update()
    {
        $shouYeModel = model('ShouYe');
        $param = $this->param;
        $str=substr($param['banner'],0,7);
        if($str=='uploads'){
            $param['banner']=addSeverPath($param['banner']);
        }
        $data = $shouYeModel->updateDataById($param, $param['id']);
        if (!$data) {
            return resultArray(['error' => $shouYeModel->getError()]);
        }
        return resultArray(['data' => '修改成功']);
    }

    //   删除首页信息
    public function delete()
    {
        $shouYeModel = model('ShouYe');
        $param = $this->param;
        $data = $shouYeModel->delDataById($param['id']);
        if (!$data) {
            return resultArray(['error' =>$serviceModel->getError()]);
        }
        return resultArray(['data' => '删除成功']);
    }


    public function deletes()
    {
        $shouYeModel = model('ShouYe');
        $param = $this->param;
        $data = $shouYeModel->delDatas($param['ids']);
        if (!$data) {
            return resultArray(['error' => $shouYeModel->getError()]);
        }
        return resultArray(['data' => '删除成功']);
    }

    public function enables()
    {
        $shouYeModel = model('ShouYe');
        $param = $this->param;
        $data = $shouYeModel->enableDatas($param['ids'], $param['status']);
        if (!$data) {
            return resultArray(['error' => $shouYeModel->getError()]);
        }
        return resultArray(['data' => '操作成功']);
    }

}
