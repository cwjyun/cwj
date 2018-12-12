<?php

namespace app\controllers\cwj;

use Yii;
use yii\rest\Action;
use api\common\CommonClass;
use api\common\ErrorCode;
use api\common\helpers\ValidateHelper;
use api\models\user\User_cwj;

class RegAction extends Action
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
                [['username', 'password', 'email'], 'string', 'length' => [8, 20]],
            ];
            $input = CommonClass::get_api_data();
            $check_data = ValidateHelper::validate($input, $rules);
            if ($check_data->code != ErrorCode::SUCCEED) {
                CommonClass::ajax_error($check_data->message);
            }
            $user = new User_cwj();
            $check_user_name = $user::find()->where(['username' => $input['username']])->one();
            if ($check_user_name) {
                CommonClass::ajax_error(['message' => '账号存在']);
            }

            $input['update_time'] = date('Y-m-d H:i:s');
            $input['create_time'] = date('Y-m-d H:i:s');
            $input['ip'] = Yii::$app->request->getUserIP();
            $input['password'] = md5($input['password']);
            $user->setAttributes($input);
            $user->save();
            if ($user->errors) {
                CommonClass::ErrorSendMail('注册时数据库保存', ['error' => $user->errors, 'content' => $input]);
                CommonClass::ajax_error(['message' => '接口出错']);
            }
            CommonClass::ajax_success(['message' => '创建账号成功']);
        } catch (\Exception $e) {
            echo $e;
        }
    }


}