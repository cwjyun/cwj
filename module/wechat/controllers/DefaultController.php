<?php

namespace app\module\wechat\controllers;
/**
 * Default controller for the `Wechat` module
 */
class DefaultController extends \app\module\wechat\controllers\BaseController
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
