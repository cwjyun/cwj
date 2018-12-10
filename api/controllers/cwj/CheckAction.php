<?php

namespace app\controllers\cwj;

use Yii;
use yii\rest\Action;
use api\common\CommonClass;
use api\common\ErrorCode;
use api\common\helpers\ValidateHelper;


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
        $input = CommonClass::get_api_data();
        if (empty($input)) {
            return CommonClass::ajax_error(['无请求参数']);
        }
        try {
            $rules = [
                [['username', 'password','email'], 'required'],
                [['sign'], 'verification'],
            ];
            $check_data = ValidateHelper::validate($input, $rules);
            if ($check_data->code != ErrorCode::SUCCEED) {
                CommonClass::ajax_error($check_data->message);
            }
           return CommonClass::ajax_success(['调用成功']);
        } catch (\Exception $e) {
            echo $e;
        }
    }
                                                                                                                                        

}