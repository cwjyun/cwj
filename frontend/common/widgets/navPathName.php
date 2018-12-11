<?php

namespace app\common\widgets;

use Yii;
use yii\base\Widget;
use app\common\CommonClass;

class navPathName extends Widget
{
    public function init()
    {
        parent::init();
    }


    public function run()
    {
        $controller = Yii::$app->controller->id;
        $action = Yii::$app->controller->action->id;
        $path_info = Yii::$app->params['basics_info'];
        $path_info_name = [
            'controller' => $path_info[$controller][$controller]['name'],
            'action' => $path_info[$controller][$action]['name'],
            'controller_url' => '',
            'action_url' => '',
        ];
        return $this->render('nav_path_name', [
            'path_info_name' => $path_info_name,
        ]);
    }

}

?>