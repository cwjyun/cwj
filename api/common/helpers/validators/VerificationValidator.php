<?php
/**
 * @link
 * @copyright Copyright (c)
 * @license
 */

namespace api\common\helpers\validators;

use app\common\CommonClass;
use Yii;
use api\models\Signature;


class VerificationValidator extends Validator
{

    public function validate($data, $rules)
    {
        if (is_array($data) && is_array($rules)) {
            //签名,测试环境不用签名
            if(!Yii::$app->Ras->check_single_signature($data)){
                $this->addError('sign','sign验证出错');
            }
        }
        return $this->error;
    }
}
