<?php
// +----------------------------------------------------------------------
// | Description: 案例设置
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;

class AboutUs extends ApiCommon
{
    //get:获取案例列表
    public function index()
    {
       $aboutUsModel = model('AboutUs');
        $param = $this->param;
        $keywords = !empty($param['keywords']) ? $param['keywords']: '';
        $page = !empty($param['page']) ? $param['page']: '';
        $limit = !empty($param['limit']) ? $param['limit']: '';
        $data =$aboutUsModel->getDataList($keywords, $page, $limit);
        return resultArray(['data' => $data]);
    }

    //get: 通过ID获取案例的详细信息
    public function read()
    {
       $aboutUsModel = model('AboutUs');
        $param = $this->param;
        $data =$aboutUsModel->getDataById($param['id']);
        if (!$data) {
            return resultArray(['error' =>$aboutUsModel->getError()]);
        }
        return resultArray(['data' => $data]);
    }

    //post:添加案例
    public function save()
    {
       $aboutUsModel = model('AboutUs');
        $param = $this->param;
        if($param['photo']){
            $param['photo']=addSeverPath($param['photo']);
        }else{
            $param['photo']= '';
        }
        $data =$aboutUsModel->createData($param);
        if (!$data) {
            return resultArray(['error' =>$aboutUsModel->getError()]);
        }
        return resultArray(['data' => '添加成功']);
    }

    //put:() 修改案例
    public function update()
    {
       $aboutUsModel = model('AboutUs');
        $param = $this->param;
        $str=substr($param['photo'],0,7);
        if($str=='uploads'){
            $param['photo']=addSeverPath($param['photo']);
        }
        $data =$aboutUsModel->updateDataById($param, $param['id']);
        if (!$data) {
            return resultArray(['error' =>$aboutUsModel->getError()]);
        }
        return resultArray(['data' => '修改成功']);
    }

    //   删除案例
    public function delete()
    {
       $aboutUsModel = model('AboutUs');
        $param = $this->param;
        $data =$aboutUsModel->delDataById($param['id']);
        if (!$data) {
            return resultArray(['error' =>$serviceModel->getError()]);
        }
        return resultArray(['data' => '删除成功']);
    }


    public function deletes()
    {
       $aboutUsModel = model('AboutUs');
        $param = $this->param;
        $data =$aboutUsModel->delDatas($param['ids']);
        if (!$data) {
            return resultArray(['error' =>$aboutUsModel->getError()]);
        }
        return resultArray(['data' => '删除成功']);
    }

    public function enables()
    {
       $aboutUsModel = model('AboutUs');
        $param = $this->param;
        $data =$aboutUsModel->enableDatas($param['ids'], $param['status']);
        if (!$data) {
            return resultArray(['error' =>$aboutUsModel->getError()]);
        }
        return resultArray(['data' => '操作成功']);
    }

}
