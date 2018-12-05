<?php

namespace app\controllers\cwj;

use Yii;
use yii\rest\Action;


class CheckAction extends Action
{
    /**
     * @param $ppid
     * @param string $type
     * @param string $point
     * @param string $consume_id
     * @param string $consume_name
     */
    public function run()
    {
        try {
            $result = Yii::$app->ras->sign("xxxxx");
        } catch (\Exception $e) {
            echo $e;
        }
    }


}