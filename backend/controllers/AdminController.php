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

    /**
     * 后台首页
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * 配置信息页面
     * @return string
     */
    public function actionWelcome()
    {
        $mysql_info = Yii::$app->cwj_db->createCommand("select version()")->queryOne();
        $data['mysql_info']['banben'] = $mysql_info['version()'];
        return $this->render('welcome', ['data' => $data]);
    }


    /**
     * 文章导航管理页面
     * @return string
     */
    public function actionCate()
    {
        return $this->render('cate');
    }


    public function actionEditcate(){
        return $this->render('edit_cate');
    }

}
