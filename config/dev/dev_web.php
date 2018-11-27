<?php

$params = require __DIR__ . '/' . YII_ENV . '_params.php';
$db = require __DIR__ . '/' . YII_ENV . '_db.php';
$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__) . '/../',
    'bootstrap' => ['log'],
    'defaultRoute' => 'my/index',//默认路由，控制器+方法
    'name'=>'开心就好',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    //模块
    'modules' => [
        'dome' => [
            'class' => 'app\module\dome\dome'
        ],
        //微信模块
        'wechat' => [
            'class' => 'app\module\wechat\wechat'
        ],
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'a27waVf2KDONr7GG93cq3Jp5XcmZ36_1',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        //配置文件后缀名
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
            'rules' => [
                'class' => 'yii\rest\UrlRule',
                'controller' => 'wechat',
                'extraPatterns' => [
                    'GET valid' => 'valid',
                ],
            ],
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        //模块

    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['172.*.*.*', '::1', '47.93.246.251'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['172.*.*.*', '::1', '47.93.246.251'],
    ];
}

return $config;
