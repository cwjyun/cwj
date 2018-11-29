<?php

namespace app\controllers\wechat;

use Yii;
use yii\rest\Action;
use app\common\CommonClass;


class TokenAction extends Action
{
    /**
     * @param $ppid
     * @param string $type
     * @param string $point
     * @param string $consume_id
     * @param string $consume_name
     */
    public function run($signature, $timestamp, $nonce)
    {
        try {
            if (!Yii::$app->wechat->checkSignature($signature, $timestamp, $nonce)) {
                return false;
            }
            return true;

        } catch (\Exception $e) {
            var_dump($e);
        }
    }


}