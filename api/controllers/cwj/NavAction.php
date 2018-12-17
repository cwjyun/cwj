<?php

namespace app\controllers\cwj;

use Yii;
use yii\rest\Action;
use api\common\CommonClass;
use api\models\menu;

class NavAction extends Action
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
            $data = CommonClass::genTree(menu::get_all());
            CommonClass::ajax_success(['data' => $data, 'message' => '']);
        } catch (\Exception $e) {
            echo $e;
        }
    }


}