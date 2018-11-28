<?php

namespace app\controllers\wechat;

use Yii;
use yii\rest\Action;

class TokenAction extends Action
{
    /**
     * @param $ppid
     * @param string $type
     * @param string $point
     * @param string $consume_id
     * @param string $consume_name
     */
    public function run($echostr, $signature, $timestamp, $nonce)
    {
        try {
            $get = [
                'echostr' => $echostr,
                'signature' => $signature,
                'timestamp' => $timestamp,
                'nonce' => $nonce
            ];
            $this->valid($get);

        } catch (\Exception $e) {

        }
    }

    public function valid($get)
    {
        $echoStr = $get["echostr"];
        $signature = $get["signature"];
        $timestamp = $get["timestamp"];
        $nonce = $get["nonce"];
        //valid signature , option
        if ($this->checkSignature($signature, $timestamp, $nonce)) {
            echo $echoStr;
        }
    }

    private function checkSignature($signature, $timestamp, $nonce)
    {
        // you must define TOKEN by yourself
        $token = Yii::$app->params['wechat']['token'];
        if (!$token) {
            echo 'TOKEN is not defined!';
        } else {
            $tmpArr = array($token, $timestamp, $nonce);
            file_put_contents('cwj.text',$tmpArr);
            // use SORT_STRING rule
            sort($tmpArr, SORT_STRING);
            $tmpStr = implode($tmpArr);
            $tmpStr = sha1($tmpStr);

            if ($tmpStr == $signature) {
                return true;
            } else {
                return false;
            }
        }
    }


}