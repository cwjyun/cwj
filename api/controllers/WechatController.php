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
        die("xx");
        parent::init();
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'GetToken' => [
                'class' => 'api\controller\wechat\GetToken',
                'modelClass' => $this->modelClass,
            ],
        ];
    }
}