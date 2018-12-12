<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;

/**
 * Site controller
 */
class BaseController extends Controller
{
    public $enableCsrfValidation = false;

    
    public function beforeAction($action)
    {
        if (!Yii::$app->session['id'] && Yii::$app->controller->action->id != 'login') {
            $this->redirect(['base/login']);
        }
        return parent::beforeAction($action);
    }

    /**
     * 登录页面
     * @return string
     */
    public function actionLogin()
    {
        if (Yii::$app->request->isAjax) {
            die("xxxx");
        }
        return $this->render('login');
    }
}
