<?php

namespace api\controllers;

use yii\rest\ActiveController;
use common\models\Wechat;

/**
 */
class WechatController extends ActiveController
{

    public $modelClass = '\common\models\Wechat';
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'], $actions['create']);
        return [
            //获取微信token
            'token' => [
                'class' => 'app\controllers\wechat\TokenAction',
                'modelClass' => $this->modelClass
            ],
        ];
    }
    
}