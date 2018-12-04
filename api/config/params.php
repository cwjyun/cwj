<?php
return [
    //发件人邮箱
    'adminEmail' => ['Wangjing.Cui@zhan.com' => '崔汪敬'],//    收件人,'gavin.gong@zhan.com'=>'gavin'
    'mailerUserName' => 'cwjyun@163.com',//发件邮箱账号
    'mailerPassword' => '198653026asd',//发件邮箱密码
    'mailerHost' => 'smtp.163.com',
    'mailerPort' => 25,
    'request_time_out' => 2500,
    'check_api' => '3344314',
    'log' => [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=47.93.246.251;dbname=log',
        'username' => 'root',
        'password' => '3344134',
        'charset' => 'utf8',
    ],
    'cwj' => [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=47.93.246.251;dbname=cwj',
        'username' => 'root',
        'password' => '3344134',
        'charset' => 'utf8',
    ],
    'wechat' => [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=47.93.246.251;dbname=wechat',
        'username' => 'root',
        'password' => '3344134',
        'charset' => 'utf8',
    ],
    'redis' => [
        'class' => 'yii\redis\Connection',
        'hostname' => '47.93.246.251',
        'password' => '3344134',
        'port' => 6379,
        'database' => 0,
    ],
];
