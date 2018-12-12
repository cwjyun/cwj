<?php
/*选择专项返回题型tiku_toefl_label中typeid
             * */

namespace app\modules\ajax\controllers\ajax;

use Yii;
use yii\rest\Action;
use app\common\CommonClass;
use app\common\helpers\ValidateHelper;


class loginAction extends Action
{

    public function run()
    {
        try {
            $input = CommonClass::get_api_data();

            $rules = [
                [['username', 'password'], 'required'],
            ];

            $check_data = ValidateHelper::validate($input, $rules);

            if (!$check_data) {
                CommonClass::ajax_error(['message' => $check_data->message]);
            }

            $result = CommonClass::login($input);

            if (!$result['code']) {
                CommonClass::ajax_error($result['data']);
            }
            Yii::$app->session['token'] = $result['data']['token'];
            $hash_uid = hash('sha1', $input['username']);
            Yii::$app->redis->setex("user:".$hash_uid, 31536000,json_encode($input));
            Yii::$app->redis->expire('cwj_session_id:' . $hash_uid, 31536000);
            $cookies = Yii::$app->response->cookies;
            $cookies->add(new \yii\web\Cookie([
                'name' => 'cwj_session_id',
                'value' => $hash_uid,
                'expire' => 31536000
            ]));
            CommonClass::ajax_success(['data' => $hash_uid, 'message' => '登录成功']);
        } catch (\Exception $e) {
            echo $e;
        }
    }
}
