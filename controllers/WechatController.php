<?php

namespace api\controllers;

use Yii;
use yii\rest\ActiveController;

class WechatController extends ActiveController
{

    public $modelClass = '';

    public function actionValid()
    {
        $echoStr = $_GET["echostr"];
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        //valid signature , option
        if($this->checkSignature($signature,$timestamp,$nonce)){
            echo $echoStr;
        }
    }

    private function checkSignature($signature,$timestamp,$nonce)
    {
        // you must define TOKEN by yourself
        $token = Yii::$app->params['wechat']['token'];
        if (!$token) {
            echo 'TOKEN is not defined!';
        } else {
            $tmpArr = array($token, $timestamp, $nonce);
            // use SORT_STRING rule
            sort($tmpArr, SORT_STRING);
            $tmpStr = implode( $tmpArr );
            $tmpStr = sha1( $tmpStr );

            if( $tmpStr == $signature ){
                return true;
            }else{
                return false;
            }
        }
    }

}