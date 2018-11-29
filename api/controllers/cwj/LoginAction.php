<?php

namespace app\controllers\cwj;

use Yii;
use yii\rest\Action;
use api\common\CommonClass;
use api\common\helpers\ValidateHelper;

class LoginAction extends Action
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
            $rules = [
                [['username', 'password'], 'required'],
            ];
            $input = Yii::$app->request->bodyParams;

            $result = ValidateHelper::validate($input, $rules);
            print_r($result);
            die(2222);

        } catch (\Exception $e) {
            echo $e;
        }
    }


}