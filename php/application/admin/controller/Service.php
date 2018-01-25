<?php
// +----------------------------------------------------------------------
// | Description: 服务设置
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;

use think\Validate;

class Service extends ApiCommon
{
    //get:获取服务列表
    public function index()
    {
       $serviceModel = model('Service');
        $param = $this->param;
        $keywords = !empty($param['keywords']) ? $param['keywords']: '';
        $page = !empty($param['page']) ? $param['page']: '';
        $limit = !empty($param['limit']) ? $param['limit']: '';
        $data =$serviceModel->getDataList($keywords, $page, $limit);
        return resultArray(['data' => $data]);
    }

    //get: 通过ID获取服务的详细信息
    public function read()
    {
       $serviceModel = model('Service');
        $param = $this->param;
        $data =$serviceModel->getDataById($param['id']);
        if (!$data) {
            return resultArray(['error' =>$serviceModel->getError()]);
        }
        return resultArray(['data' => $data]);
    }

    //post:添加服务
    public function save()
    {
       $serviceModel = model('Service');
        $param = $this->param;
        if($param['backimage']){
            //给上传的背景图加上服务器路径
            $param['backimage']=addSeverPath($param['backimage']);
        }else{
            $param['backimage']= '';
        }
        $data =$serviceModel->createData($param);
        //echo $serviceModel->getLastSql();
        if (!$data) {
            return resultArray(['error' =>$serviceModel->getError()]);
        }
        return resultArray(['data' => '添加成功']);
    }

    //put:() 修改服务
    public function update()
    {
       $serviceModel = model('Service');
        $param = $this->param;
        $str=substr($param['backimage'],0,7);
        if($str=='uploads'){
            $param['backimage']=addSeverPath($param['backimage']);
        }
        $data =$serviceModel->updateDataById($param, $param['id']);
        if (!$data) {
            return resultArray(['error' =>$serviceModel->getError()]);
        }
        return resultArray(['data' => '修改成功']);
    }

    //   删除服务
    public function delete()
    {
       $serviceModel = model('Service');
        $param = $this->param;
        $data =$serviceModel->delDataById($param['id']);
        if (!$data) {
            return resultArray(['error' =>$serviceModel->getError()]);
        }
        return resultArray(['data' => '删除成功']);
    }


    public function deletes()
    {
       $serviceModel = model('Service');
        $param = $this->param;
        $data =$serviceModel->delDatas($param['ids']);
        if (!$data) {
            return resultArray(['error' =>$serviceModel->getError()]);
        }
        return resultArray(['data' => '删除成功']);
    }

    public function enables()
    {
       $serviceModel = model('Service');
        $param = $this->param;
        $data =$serviceModel->enableDatas($param['ids'], $param['status']);
        if (!$data) {
            return resultArray(['error' =>$serviceModel->getError()]);
        }
        return resultArray(['data' => '操作成功']);
    }

}
