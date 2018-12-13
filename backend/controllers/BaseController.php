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
            if (!$user_info) {
                CommonClass::ajax_error(['message' => '账号或者密码错误']);
            }
            $hash_uid = hash('sha1', $post['username']);
            Yii::$app->redis->setex("user:" . $hash_uid, 31536000, json_encode($post));
            Yii::$app->redis->expire('cwj_session_id:' . $hash_uid, 31536000);
            $cookies = Yii::$app->response->cookies;
            $cookies->add(new \yii\web\Cookie([
                'name' => 'cwj_session_id',
                'value' => $hash_uid,
                'expire' => 31536000
            ]));
            Yii::$app->session['id'] = $user_info->id;
            Yii::$app->session['username'] = $user_info->username;
            Yii::$app->session['ip'] = $user_info->ip;
            Yii::$app->session['status'] = $user_info->status;
            $ha = 'user:' . $cookies->get('cwj_session_id');
            $result = json_decode(Yii::$app->redis->get($ha), true);
            CommonClass::ajax_success(['data' => $hash_uid, 'message' => '登录成功']);
        }
        return $this->render('login');
    }


    public function actionOut()
    {
        $session = Yii::$app->session;

        if ($session->isActive) ;
        $session->open();
        $session->close();
        $session->destroy();
        $this->redirect(['base/login']);
    }


}
