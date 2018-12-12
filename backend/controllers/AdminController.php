<?php
namespace backend\controllers;

use Yii;

/**
 * Site controller
 */
class AdminController extends BaseController
{

    public function actionIndex(){
       return $this->render('index');    }
}
