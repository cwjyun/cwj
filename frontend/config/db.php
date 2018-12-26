<?php

return [
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
    'ecs' => [
        'class' => 'yii\db\Connection',
        'dsn' => 'mysql:host=47.93.246.251;dbname=ecs',
        'username' => 'root',
        'password' => '3344134',
        'charset' => 'utf8',
    ],
    
    'redis' => [
        'class' => 'yii\redis\Connection',
        'hostname' => '47.93.246.251',
        'password'=>'3344134',
        'port' => 6379,
        'database' => 0,
    ],
];
?>