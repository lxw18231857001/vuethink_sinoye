<?php
// +----------------------------------------------------------------------
// | Description: 组织架构
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;

class CaseType extends ApiCommon
{
    
    public function index()
    {   
        $caseTypeModel = model('CaseType');
        $param = $this->param;
        $data = $caseTypeModel->getDataList();
        return resultArray(['data' => $data]);
    }

    public function read()
    {   
        $caseTypeModel = model('CaseType');
        $param = $this->param;
        $data = $caseTypeModel->getDataById($param['id']);
        if (!$data) {
            return resultArray(['error' => $caseTypeModel->getError()]);
        } 
        return resultArray(['data' => $data]);
    }

    public function save()
    {
        $caseTypeModel = model('CaseType');
        $param = $this->param;
        $data = $caseTypeModel->createData($param);
        if (!$data) {
            return resultArray(['error' => $caseTypeModel->getError()]);
        } 
        return resultArray(['data' => '添加成功']);
    }

    public function update()
    {
        $caseTypeModel = model('CaseType');
        $param = $this->param;
        $data = $caseTypeModel->updateDataById($param, $param['id']);
        if (!$data) {
            return resultArray(['error' => $caseTypeModel->getError()]);
        } 
        return resultArray(['data' => '编辑成功']);
    }

    public function delete()
    {
        $caseTypeModel = model('CaseType');
        $param = $this->param;
        $data = $caseTypeModel->delDataById($param['id'], true);       
        if (!$data) {
            return resultArray(['error' => $caseTypeModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']);    
    }

    public function deletes()
    {
        $caseTypeModel = model('CaseType');
        $param = $this->param;
        $data = $caseTypeModel->delDatas($param['ids'], true);  
        if (!$data) {
            return resultArray(['error' => $caseTypeModel->getError()]);
        } 
        return resultArray(['data' => '删除成功']); 
    }

    public function enables()
    {
        $caseTypeModel = model('CaseType');
        $param = $this->param;
        $data = $caseTypeModel->enableDatas($param['ids'], $param['status'], true);  
        if (!$data) {
            return resultArray(['error' => $caseTypeModel->getError()]);
        } 
        return resultArray(['data' => '操作成功']);         
    }
}
 