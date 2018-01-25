<?php
// +----------------------------------------------------------------------
// | Description: 系统配置
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\admin\controller;

class SystemConfigs extends ApiCommon
{
    //get: 获取系统基本信息
    public function read()
    {
        $configModel = model('SystemConfig');
        $param = $this->param;
        $data = $configModel->getDataList($param);
        if (!$data) {
            return resultArray(['error' => $configModel->getError()]);
        }
        return resultArray(['data' => $data]);
    }

    //post: 添加系统信息
    public function save()
    {
//        var_dump($_SERVER);
        $configModel = model('SystemConfig');
        $param = $this->param;
        // 给SYSTEM_LOGO添加上服务器（域名）地址
        $str=substr($param['SYSTEM_LOGO'],0,7);
        if($str=='uploads'){
            $param['SYSTEM_LOGO']=addSeverPath($param['SYSTEM_LOGO']);
        }
        $data = $configModel->createData($param);
        if (!$data) {
            return resultArray(['error' => $configModel->getError()]);
        } 
        return resultArray(['data' => '添加成功']);
    }
}
 