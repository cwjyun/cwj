<?php
/*选择专项返回题型tiku_toefl_label中typeid
             * */

namespace app\modules\ajax\controllers\ajax;

use Yii;
use yii\rest\Action;
use app\common\CommonClass;
use app\common\helpers\ValidateHelper;


class regAction extends Action
{

    public function run()
    {
        try {
            $input = CommonClass::get_api_data();
            $rules = [
                [['username', 'password', 'email'], 'string', 'length' => [1, 200]],
            ];

            $check_data = ValidateHelper::validate($input, $rules);
            if ($check_data->code != 0) {
                CommonClass::ajax_error(['message' => $check_data->message]);
            }
            $result = CommonClass::reg($input);
            if (!$result['code']) {
                CommonClass::ajax_error(['message' => $result['data']['message']]);
            }
            CommonClass::ajax_success(['message' => $result['data']['message']]);
        } catch (\Exception $e) {
            echo $e;
        }
    }
}
