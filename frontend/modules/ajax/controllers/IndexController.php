<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-3-5
 * Time: 上午10:34
 */

namespace app\modules\ajax\controllers;


use yii\rest\ActiveController;



class IndexController extends ActiveController {

    public $modelClass = 'app\models\vip_api_logs';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        return $behaviors;
    }
    
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['delete'], $actions['create'] ,  $actions['update']);
        $actions['sendcorrectreport'] = [
            'class' => 'app\modules\zajax\controllers\task\sendcorrectreportAction',
            'modelClass' => $this->modelClass
        ];
        $actions['index'] = [
            'class' => 'app\modules\ajax\controllers\ajax\indexAction',
            'modelClass' => $this->modelClass
        ];
        
        return $actions;
    }


    protected function verbs()
    {
        return array(
            'sendcorrectreport' => ['POST'],
        );
    }
} 