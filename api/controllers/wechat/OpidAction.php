<?php

namespace app\controllers\wechat;

use Yii;
use yii\rest\Action;
use app\common\CommonClass;


class OpidAction extends Action
{
    /**
     * @param $ppid
     * @param string $type
     * @param string $point
     * @param string $consume_id
     * @param string $consume_name
     */
    public function run($url)
    {
        try {
            die("xx");
            $op_url = \Yii::$app->wechat->getOauth2AuthorizeUrl($url, 'STATE', 'snsapi_userinfo');
            die(json_encode(['url'=>$op_url]));
        } catch (\Exception $e) {
            var_dump($e);
        }
    }


}