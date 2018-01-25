<?php
// +----------------------------------------------------------------------
// | Description: 基础框架路由配置文件
// +----------------------------------------------------------------------
// | Author: linchuangbin <linchuangbin@honghaiweb.com>
// +----------------------------------------------------------------------
//批量注册.定义路由配置文件,除了支持动态注册，也可以直接在应用目录下面的route.php 的最后通过返回数组的方式直接定义路由规则
return [
    // 定义资源路由
    '__rest__'=>[
        'admin/rules'		   =>'admin/rules',
        'admin/groups'		   =>'admin/groups',
        'admin/users'		   =>'admin/users',
        'admin/menus'		   =>'admin/menus',
        'admin/structures'	   =>'admin/structures',
        'admin/posts'          =>'admin/posts',
        'admin/service'        =>'admin/service',
        'admin/aboutUs'        =>'admin/aboutUs',
        'admin/cases'          =>'admin/cases',
        'admin/caseType'       =>'admin/caseType',
        'admin/news'           =>'admin/news',
        'admin/contact'        =>'admin/contact',
        'admin/systemConfigs'  =>'admin/systemConfigs',
        'admin/shouYe'         =>'admin/shouYe',
        'admin/friend'         =>'admin/friend',
        'admin/mysqls'         =>'admin/mysqls',
    ],

    // 【基础】登录
    'admin/base/login' => ['admin/base/login', ['method' => 'POST']],
    // 【基础】记住登录
    'admin/base/relogin'	=> ['admin/base/relogin', ['method' => 'POST']],
    // 【基础】修改密码
    'admin/base/setInfo' => ['admin/base/setInfo', ['method' => 'POST']],
    // 【基础】退出登录
    'admin/base/logout' => ['admin/base/logout', ['method' => 'POST']],
    // 【基础】获取配置
    'admin/base/getConfigs' => ['admin/base/getConfigs', ['method' => 'GET']],
    // 【基础】获取验证码
    'admin/base/getVerify' => ['admin/base/getVerify', ['method' => 'GET']],
    // 【基础】上传图片
    'admin/upload' => ['admin/upload/index', ['method' => 'POST']],
    // 保存系统配置
    'admin/systemConfigs' => ['admin/systemConfigs/save', ['method' => 'POST']],
    // 【规则】批量删除
    'admin/rules/deletes' => ['admin/rules/deletes', ['method' => 'POST']],
    // 【规则】批量启用/禁用
    'admin/rules/enables' => ['admin/rules/enables', ['method' => 'POST']],
    // 【用户组】批量删除
    'admin/groups/deletes' => ['admin/groups/deletes', ['method' => 'POST']],
    // 【用户组】批量启用/禁用
    'admin/groups/enables' => ['admin/groups/enables', ['method' => 'POST']],
    // 【用户】批量删除
    'admin/users/deletes' => ['admin/users/deletes', ['method' => 'POST']],
    // 【用户】批量启用/禁用
    'admin/users/enables' => ['admin/users/enables', ['method' => 'POST']],
    // 【菜单】批量删除
    'admin/menus/deletes' => ['admin/menus/deletes', ['method' => 'POST']],
    // 【菜单】批量启用/禁用
    'admin/menus/enables' => ['admin/menus/enables', ['method' => 'POST']],
    // 【组织架构】批量删除
    'admin/structures/deletes' => ['admin/structures/deletes', ['method' => 'POST']],
    // 【组织架构】批量启用/禁用
    'admin/structures/enables' => ['admin/structures/enables', ['method' => 'POST']],
    // 【部门】批量删除
    'admin/posts/deletes' => ['admin/posts/deletes', ['method' => 'POST']],
    // 【部门】批量启用/禁用
    'admin/posts/enables' => ['admin/posts/enables', ['method' => 'POST']],
    // 【服务】批量删除
    'admin/service/deletes' => ['admin/service/deletes', ['method' => 'POST']],
    // 【服务】批量启用/禁用
    'admin/service/enables' => ['admin/service/enables', ['method' => 'POST']],
    // 【我们】批量删除
    'admin/aboutUs/deletes' => ['admin/aboutUs/deletes', ['method' => 'POST']],
    // 【我们】批量启用/禁用
    'admin/aboutUs/enables' => ['admin/aboutUs/enables', ['method' => 'POST']],
    // 【案例】批量删除
    'admin/cases/deletes' => ['admin/cases/deletes', ['method' => 'POST']],
    // 【案例】批量启用/禁用
    'admin/cases/enables' => ['admin/cases/enables', ['method' => 'POST']],
    // 【案例分类】批量删除
    'admin/caseType/deletes' => ['admin/caseType/deletes', ['method' => 'POST']],
    // 【案例分类】批量启用/禁用
    'admin/caseType/enables' => ['admin/caseType/enables', ['method' => 'POST']],
    // 【新闻】批量删除
    'admin/news/deletes' => ['admin/news/deletes', ['method' => 'POST']],
    // 【新闻】批量启用/禁用
    'admin/news/enables' => ['admin/news/enables', ['method' => 'POST']],
    // 【联系】批量删除
    'admin/contact/deletes' => ['admin/contact/deletes', ['method' => 'POST']],
    // 【联系】批量启用/禁用
    'admin/contact/enables' => ['admin/contact/enables', ['method' => 'POST']],
    // 【首页】批量删除
    'admin/shouye/deletes' => ['admin/shouye/deletes', ['method' => 'POST']],
    // 【首页】批量启用/禁用
    'admin/shouye/enables' => ['admin/shouye/enables', ['method' => 'POST']],
    // 【友情链接】批量删除
    'admin/friend/deletes' => ['admin/friend/deletes', ['method' => 'POST']],
    // 【友情链接】批量启用/禁用
    'admin/friend/enables' => ['admin/friend/enables', ['method' => 'POST']],
    // 【数据库管理】批量删除
    'admin/mysqls/deletes' => ['admin/mysqls/deletes', ['method' => 'POST']],
    // 【数据库管理】导出
    'admin/mysqls/download' => ['admin/mysqls/download', ['method' => 'GET']],


    // MISS路由
    '__miss__'  => 'admin/base/miss',
];