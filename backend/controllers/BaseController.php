<?php

namespace backend\controllers;

use backend\common\CommonClass;
use Yii;
use yii\web\Controller;
use backend\models\user\User_admin;

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
            $post = Yii::$app->request->post();
            $user_info = User_admin::find()->where(['username' => $post['username'], 'password' => md5($post['password'])])->one();
            if(!$user_info){
                CommonClass::ajax_error(['message'=>'账号或者密码错误']);
            }
        }
        return $this->render('login');
    }
}
