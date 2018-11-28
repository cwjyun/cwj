<?php

namespace api\controllers;
use Yii;
use yii\rest\ActiveController;
use common\models\Wechat;
use app\common\CommonClass;

/**
 */
class WechatController extends ActiveController
{

    public $modelClass = '\common\models\Wechat';
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        //return false;
        if (empty(\Yii::$app->params['adminEmail'])) {
            return false;
        }
    }

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