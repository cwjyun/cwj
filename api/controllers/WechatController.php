<?php

namespace api\controllers;

use yii\rest\ActiveController;
use common\models\Wechat;

/**
 */
class WechatController extends ActiveController
{

    public $modelClass = '\common\models\Wechat';

    public function init()
    {
        parent::init();
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        $get =   \Yii::$app->request->get();
        $actions = parent::actions();
        unset($actions['delete'], $actions['create']);
        return [
            'token' => [
                'class' => 'app\controllers\wechat\TokenAction',
                'modelClass' => $this->modelClass
            ],
        ];
    }
    
}