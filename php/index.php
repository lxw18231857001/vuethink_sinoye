<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// [ 应用入口文件 ]

////指定允许其他域名访问
//header('Access-Control-Allow-Origin:*');
//// 响应类型
//header('Access-Control-Allow-Methods:POST');
//// 响应头设置
//header('Access-Control-Allow-Headers:x-requested-with,content-type');
//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: POST');
//header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

// 应用目录
define('APP_PATH', __DIR__.'/application/');
// 定义配置文件目录和应用目录同级
define('CONF_PATH', __DIR__.'/config/');
//引入自定义常量文件
require  './extend/const.php';
// 加载框架引导文件
require './thinkphp/start.php';
