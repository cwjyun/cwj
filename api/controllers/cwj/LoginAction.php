<?php

namespace app\controllers\cwj;

use Yii;
use yii\rest\Action;
use api\common\CommonClass;
use api\common\ErrorCode;
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
            $input = CommonClass::get_api_data();
            $check_data = ValidateHelper::validate($input, $rules);
            if ($check_data->code != ErrorCode::SUCCEED) {
                CommonClass::ajax_error($check_data->message);
            }

        } catch (\Exception $e) {
            echo $e;
        }
    }


}