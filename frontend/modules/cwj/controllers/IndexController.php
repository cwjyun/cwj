<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 15-3-5
 * Time: 上午10:34
 */

namespace app\modules\cwj\controllers;


use yii\web\Controller;
use Yii;

class IndexController extends Controller
{

    public function actionIndex(){
        print_r(Yii::$app->request->get());
        die();
         die("有没有到达这里");
    }


    public function actionCwj(){
        die("到达cwj");
    }


}