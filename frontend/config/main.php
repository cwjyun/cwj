<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/db.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$config = [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'public/index',//默认路由，控制器+方法
    'modules' => [
        'ajax' => [
            'class' => 'app\modules\ajax\Module'
        ],
        'cwj' => [
            'class' => 'app\modules\cwj\Module'
        ]
    ],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        //验签
        'Ras' => [
            'class' => 'app\common\RasClass',
            'RasClass' => [
                'public_key_file' => $params['public_rsa_key'],
                'private_key_file' => $params['private_rsa_key'],
                'RasKey' => $params['RasKey'],
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'redis' => $params['redis'],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'db' => $params['cwj'],
        'cwj_db' => $params['cwj'],
        'log_db' => $params['log'],
        'wechat_db' => $params['wechat'],
        'ecs_db' => $params['ecs'],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'suffix' => '.html',
            'rules' => [
                'http://<_m:(admin)>.cwj.test' => '<_m' //方法二 多个二级域名同时适配也可以

            ],
        ],
        'MyUrlManager' => [
            'class' => 'app\common\MyUrlManager',
            'domainName' => 'admin.cwj.test',
        ]
    ],
    'params' => $params,
];
if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environmen   t
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['172.*.*.*']
    ];

    $config['bootstrap'][] = 'xgii';
    $config['modules']['xgii'] = [
        'class' => 'yii\xgii\Module',
        'allowedIPs' => ['172.*.*.*']
    ];
}

return $config;
