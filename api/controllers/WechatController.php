<?php

namespace api\controllers;
use app\common\CommonClass;
use Yii;
use yii\rest\ActiveController;

/**
 */
class WechatController extends ActiveController
{

    public $modelClass = '\common\models\Wechat';
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
        file_put_contents('111,text','111');
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
            'get_opid' => [
                'class' => 'app\controllers\wechat\OpidAction',
                'modelClass' => $this->modelClass
            ],
        ];
        
    }
    
}