<?php

namespace app\controllers;

use app\common\Wechat;
use Yii;
use app\models\wechat\WechatUser;

class MyController extends BaseController
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }






}
