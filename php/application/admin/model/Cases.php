<?php
// +----------------------------------------------------------------------
// | Description: 服务
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honraytech.com>
// +----------------------------------------------------------------------

namespace app\admin\model;

use app\admin\model\Common;

class Cases extends Common
{

    /**
     * 为了数据库的整洁，同时又不影响Model和Controller的名称
     * 我们约定每个模块的数据表都加上相同的前缀，比如微信模块用weixin作为数据表前缀
     */
    protected $name = 'Cases';
    protected $dateFormat = 'Y-m-d H:i';
    protected $type       = [ 'create_time'    =>'datetime',  ];
//    protected $createTime = 'create_time';
//    protected $updateTime = false;
//    protected $autoWriteTimestamp = true;


    /**
     * [getDataList 获取列表]
     * @linchuangbin
     * @DateTime  2017-02-10T21:07:18+0800
     * @return    [array]
     */
    public function getDataList($keywords)
    {
        $map = [];
        if ($param['keywords']) {
            $map['name'] = ['like', '%'.$keywords.'%'];
        }
        $data = $this
            ->where($map)
           ->alias('cases')
            ->join('__CASE_TYPE__ ct','cases.pid = ct.id')
            ->field('cases.*,ct.name as ct_name')
            ->order(['order'])
            ->select();
        return $data;
    }


//    public function getDataById($id = '')
//    {
//        $data = $this->get($id);
//        if (!$data) {
//            $this->error = '暂无此数据';
//            return false;
//        }
//        $data['types'] = $this->get($id)->types;
//        return $data;
//    }
    
    /**
     * 获取案例所属分类
     * @param  array   $param  [description]
     */
//    public function types()
//    {
//        return $this->belongsToMany('case_type', '__CASE_TYPE__', 'pid', 'id');
//    }

}