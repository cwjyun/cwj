<?php

namespace backend\controllers;

use backend\models\user\User_admin;
use Yii;
use yii\web\User;

/**
 * Site controller
 */
class AdminController extends BaseController
{

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionWelcome()
    {
        $mysql_info = Yii::$app->cwj_db->createCommand("select version()")->queryOne();
        $data['mysql_info']['banben'] = $mysql_info['version()'];
        return $this->render('welcome',['data'=>$data]);
    }
}
