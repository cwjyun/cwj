<?php

namespace backend\controllers;

use backend\common\CommonClass;
use Yii;
use backend\models\menu;

/**
 * Site controller
 */
class ArticleController extends BaseController
{

    /**
     * 后台首页
     * @return string
     */
    public function actionIndex()
    {
        if(Yii::$app->request->isAjax){
            $post = Yii::$app->request->post('data');
            print_r($post);
            die("xxx");
        }
        return $this->render('index');
    }
    


}
