<?php

namespace api\controllers;
use app\common\CommonClass;
use Yii;
use yii\rest\ActiveController;

/**
 */
class WechatController extends BaseActiveController
{

    public $modelClass = '\common\models\Wechat';
    public  $data;
    
    public function init()
    {
        parent::init(); // TODO: Change the autogenerated stub
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