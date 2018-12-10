<?php

namespace frontend\controllers;

use app\common\CommonClass;
use Yii;
use yii\web\Controller;


/**
 * 公用功能登录注册 都在这里
 * Class PublicController
 * @package frontend\controllers
 */
class PublicController extends Controller
{
    public $layout = false;

    public function actionIndex()
    {
        $controller = Yii::$app->controller->id;
        $this->view->title = '小崔登录页';
        $basics = CommonClass::get_basics_info();
        return $this->render('index', ['basics' => $basics]);
    }
}

?>