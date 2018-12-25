<?php
define('WECHAT_API_URL', 'http://api.test');
return [
    //发件人邮箱
    'adminEmail' => ['Wangjing.Cui@zhan.com' => '崔汪敬'],//    收件人,'gavin.gong@zhan.com'=>'gavin'
    'mailerUserName' => 'cwjyun@163.com',//发件邮箱账号
    'mailerPassword' => '198653026asd',//发件邮箱密码
    'mailerHost' => 'smtp.163.com',
    'mailerPort' => 25,
    'request_time_out' => 2500,
    'check_api' => '3344314',
    'public_rsa_key' => __DIR__ . '/../../common/tool/Rsakey/rsa_public_key.pem',
    'private_rsa_key' => __DIR__ . '/../../common/tool/Rsakey/rsa_private_key.pem',
    'RasKey' => 'cwjyun',
    'wechat_api' => [
        'getToken' => WECHAT_API_URL . '/wechat/token',
        'get_opid' => WECHAT_API_URL . '/wechat/get_opid',
    ],
    'basics_info' => [
        //公用功能控制器
        'public' => [
            'public' => [
                'title' => '小崔主页',
                'name' => '主页'
            ],
            'index' => [
                'title' => '小崔首页',
                'name' => '首页'
            ],
            'login' => [
                'title' => '小崔登录页',
                'name' => '登录'
            ],
            'reg' => [
                'title' => '小崔注册页',
                'name' => '注册'
            ] ,
            'video' =>[
                'title'=>'视频',
                'name'=>'视频'
            ]
        ]
    ],
    'login' => WECHAT_API_URL . '/cwj/login',//登录接口
    'reg' => WECHAT_API_URL . '/cwj/reg',//登录接口
    'nav' => WECHAT_API_URL . '/cwj/nav',//获取导航
];
