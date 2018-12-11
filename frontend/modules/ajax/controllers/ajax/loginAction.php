<?php
/*选择专项返回题型tiku_toefl_label中typeid
             * */
namespace app\modules\ajax\controllers\ajax;

use Yii;
use yii\rest\Action;
use app\common\CommonClass;






class loginAction extends Action
{

    public function run()
    {
        $input = CommonClass::get_api_data();
        print_r($input);
        die("调用成功");
    }
}
