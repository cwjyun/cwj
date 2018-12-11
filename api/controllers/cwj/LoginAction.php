<?php

namespace app\controllers\cwj;

use Yii;
use yii\rest\Action;
use api\common\CommonClass;
use api\common\ErrorCode;
use api\common\helpers\ValidateHelper;
use api\models\user\User_cwj;

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
            $user_info = User_cwj::find()->where(
                [
                    'username' => $input['username'],
                    'password' => md5($input['password'])
                ]
            )->asArray()->one();

            if (!$user_info) {
                CommonClass::ajax_error('账号或者密码错误');
            }

        } catch (\Exception $e) {
            CommonClass::ErrorSendMail('接口出错', $e->getMessage());
        }
    }


}