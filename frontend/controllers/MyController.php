<?php

namespace frontend\controllers;

use Yii;
use app\models\log\log;

/**
 * Site controller
 */
class MyController extends BaseController
{
    /**
     * 网站首页
     */
    public function actionIndex()
    {
        return $this->render('index');
    }


}
