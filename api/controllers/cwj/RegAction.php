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
                [['allowance', 'allowance_updated_at'], 'required'],
                [['username', 'password'], 'string', 'max' => 50],
                [['email', 'auth_key'], 'string', 'max' => 60],
                [['username', 'password'], 'unique'],
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