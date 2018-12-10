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
    'wechat_api' => [
        'getToken' => WECHAT_API_URL . '/wechat/token',
        'get_opid' => WECHAT_API_URL . '/wechat/get_opid',
    ],
    'basics_info' => [
        //公用功能控制器
        'public' => [
            'index'=>[
                'title'=>'小崔首页',
            ],
            'login' => [
                  'title'=>'小崔登录页',
            ]
        ]
    ]
];
