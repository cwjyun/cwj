<?php

namespace app\module\wechat\controllers;

use yii\web\Controller;

/**
 * Default controller for the `Wechat` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}