<?php
// +----------------------------------------------------------------------
// | Description: 案例设置
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;

class Cases extends ApiCommon
{
    //get:获取案例列表
    public function index()
    {
       $caseModel = model('Cases');
        $param = $this->param;
        $keywords = !empty($param['keywords']) ? $param['keywords']: '';
        $page = !empty($param['page']) ? $param['page']: '';
        $limit = !empty($param['limit']) ? $param['limit']: '';
        $data =$caseModel->getDataList($keywords, $page, $limit);
        return resultArray(['data' => $data]);
    }


    //get: 通过ID获取案例的详细信息
    public function read()
    {
       $caseModel = model('Cases');
        $param = $this->param;
        $data =$caseModel->getDataById($param['id']);
        if (!$data) {
            return resultArray(['error' =>$caseModel->getError()]);
        }
        return resultArray(['data' => $data]);
    }

    //post:添加案例
    public function save()
    {
       $caseModel = model('Cases');
        $param = $this->param;
        if($param['logo']){
            $param['logo']=addSeverPath($param['logo']);
        }else{
            $param['logo']= '';
        }
        $data =$caseModel->createData($param);
        if (!$data) {
            return resultArray(['error' =>$caseModel->getError()]);
        }
        return resultArray(['data' => '添加成功']);
    }

    //put:() 修改案例
    public function update()
    {
       $caseModel = model('Cases');
        $param = $this->param;
        $str=substr($param['logo'],0,7);
        if($str=='uploads'){
            $param['logo']=addSeverPath($param['logo']);
        }
        $data =$caseModel->updateDataById($param, $param['id']);
        if (!$data) {
            return resultArray(['error' =>$caseModel->getError()]);
        }
        return resultArray(['data' => '修改成功']);
    }

    //   删除案例
    public function delete()
    {
       $caseModel = model('Cases');
        $param = $this->param;
        $data =$caseModel->delDataById($param['id']);
        if (!$data) {
            return resultArray(['error' =>$serviceModel->getError()]);
        }
        return resultArray(['data' => '删除成功']);
    }


    public function deletes()
    {
       $caseModel = model('Cases');
        $param = $this->param;
        $data =$caseModel->delDatas($param['ids']);
        if (!$data) {
            return resultArray(['error' =>$caseModel->getError()]);
        }
        return resultArray(['data' => '删除成功']);
    }

    public function enables()
    {
       $caseModel = model('Cases');
        $param = $this->param;
        $data =$caseModel->enableDatas($param['ids'], $param['status']);
        if (!$data) {
            return resultArray(['error' =>$caseModel->getError()]);
        }
        return resultArray(['data' => '操作成功']);
    }

}
