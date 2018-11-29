<?php
define('WECHAT_API_URL', 'http://api.test');
return [
    'adminEmail' => 'admin@example.com',
    'wechat_api'=>[
        'getToken'=>WECHAT_API_URL.'/wechat/token',
        'get_opid' =>WECHAT_API_URL.'/wechat/get_opid',
    ]
];
