<?php

namespace app\module\wechat\controllers;

use Yii;
use yii\web\Controller;
use app\common\Wechat;


class BaseController extends Controller
{
    public $teacher_url = '';

    public function init()
    {
        $this->teacher_url = \Yii::$app->request->getHostInfo() . '/weixin/default/index.html';
    }

    public function actionIndex()
    {

    }


    public function beforeAction($action)
    {
        parent::beforeAction($action); // TODO: Change the autogenerated stub
        $code =  \Yii::$app->request->get() ;
        if(!$code) {
            $op_url  = \Yii::$app->wechat->getOauth2AuthorizeUrl($this->teacher_url, 'STATE', 'snsapi_userinfo');
            $this->redirect($op_url)->send();
        }else{
            //获取微信unid以及opid
            $mixed_wechat_access = Yii::$app->wechat->getAccessToken($code);
            file_put_contents('file_put.txt',var_export($mixed_wechat_access));
           die();
        }
        //第一步生成请求微信带参数的地址
        return true;
    }


}
