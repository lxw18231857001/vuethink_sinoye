<?php
/**
 * Created by PhpStorm.
 * User: lxw
 * Date: 2017/12/8
 * Time: 16:24
 */

namespace app\home\model;

use think\Model;
use think\Db;

class News extends Model
{
    protected $name = 'news';
    /**
     * [getDataList 列表]
     * @AuthorHTL
     * @DateTime  2017-02-10T22:19:57+0800
     * @param     [string]                   $keywords [关键字]
     * @param     [number]                   $page     [当前页数]
     * @param     [number]                   $limit    [t每页数量]
     * @return    [array]                             [description]
     */
    public function getDataList($page, $limit)
    {
        $map = [];
        $dataCount = Db::name('news')->where($map)->count('id');

        // 若有分页
        if ($page && $limit) {
            $list = Db::name('news')->page($page, $limit)->select();
        }

        $data['list'] = $list;
        $data['dataCount'] = $dataCount;
        return $data;
    }

}