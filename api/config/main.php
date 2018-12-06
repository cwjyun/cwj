<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$config = [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'Ras' => [
            'class' => 'api\common\RasClass',
            'RasClass'=>[
                'public_key_file' => $params['public_rsa_key'],
                'private_key_file' => $params['private_rsa_key'],
                'RasKey' =>    $params['RasKey'],
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            'class' => 'yii\redis\Session',
            'redis' => 'redis',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
                [
                    'class' => 'yii\log\EmailTarget',
                    'mailer' => 'mailer',
                    'levels' => ['error'],
                    'categories' => ['yii\db\*', 'api\models\*', 'app\controllers\*'],
                    'message' => [
                        'from' => [$params['mailerUserName']],
                        'to' => $params['adminEmail'],
                        'subject' => 'Database errors at teacher.zhan.test',
                    ],
                ],
            ],
        ],
        //日志库
        'log_db' => $params['log'],
        //主库
        'cwj_db' => $params['cwj'],
        //微信库
        'wechat_db' => $params['wechat'],
        //redis 缓存库
        'redis' => $params['redis'],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            //'viewPath' => '@common/mail',//发送模板
            'useFileTransport' => false,//这句一定有，false发送邮件，true只是生成邮件在runtime文件夹下，不发邮件
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => $params['mailerHost'],
                'username' => $params['mailerUserName'],
                'password' => $params['mailerPassword'],
                'port' => $params['mailerPort'],
                'encryption' => 'tls',//ssl
            ],
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
//            'enableStrictParsing' => true,
            'rules' => [
                [
                    'class' => 'yii\rest\UrlRule',
                    'controller' => ['wechat', 'cwj']
                ],
            ],
        ],
        'wechat' => [
            'class' => 'app\components\Wechat',
            'appId' => 'wx378d3395a6f41442',
            'appSecret' => 'oexXSyfhFZIrpO5Xi8ohEkfpRsG4djbmKTKIJnbj3XD',
            'token' => 'cwjyun',
            'wechatRedirect' => 'http://47.93.246.251/get-weixin-code.html?',
        ]
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['172.*.*.*','::1','127.0.0.1']
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['172.*.*.*','127.0.0.1']
    ];
}


return $config;
