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
                [['username', 'password', 'email'], 'required'],
                [['sign'], 'verification'],
            ];
            $check_data = ValidateHelper::validate($input, $rules);
            print_r($input);
            die("调用成功");
        } catch (\Exception $e) {
            echo $e;
        }
    }
}
