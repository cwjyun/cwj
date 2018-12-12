<?php

namespace app\controllers\cwj;

use Yii;
use yii\rest\Action;
use api\common\CommonClass;
use api\common\ErrorCode;
use api\common\helpers\ValidateHelper;
use api\models\user\User_cwj;
use yii\web\User;

class LoginAction extends Action
{
    /**
     * @param username
     * @param password
     * @param sgin
     */
    public function run()
    {
        try {
            $rules = [
                [['username', 'password', 'RasKey'], 'required'],
                [['sign'], 'verification'],
            ];

            $input = CommonClass::get_api_data();
            $check_data = ValidateHelper::validate($input, $rules);
            if ($check_data->code != ErrorCode::SUCCEED) {
                CommonClass::ajax_error(['message'=>$check_data->message]);
            }
            $user_info = User_cwj::find()->where(['username' => $input['username'], 'password' => md5($input['password'])])->asArray()->one();
            if (!$user_info) {
                CommonClass::ajax_error(['message' => '账号或者密码错误']);
            }
            $token = md5(uniqid());
            Yii::$app->redis->setex("Token:" . $token, 6000, $user_info['id']);
            User_cwj::updateAll(
                ['ip' => Yii::$app->request->userIP, 'update_time' => date('Y-m-d H:i:s')],
                ['id' => $user_info['id']]
            );
            CommonClass::ajax_success(['token' => $token]);
        } catch (\Exception $e) {
            CommonClass::ErrorSendMail('接口出错', $e->getFile() . "<br>" . $e->getLine() . "<br>" . $e->getMessage());
        }
    }


}