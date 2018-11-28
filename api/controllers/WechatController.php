<?php

namespace api\controllers;

use yii\rest\ActiveController;
use common\models\Article;

/**
 */
class WechatController extends ActiveController
{

    public $modelClass = '\common\models\Article';

    public function init()
    {
        parent::init();
    }

    public function actionIndex()
    {

    }
}