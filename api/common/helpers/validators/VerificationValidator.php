<?php
/**
 * @link 
 * @copyright Copyright (c)
 * @license 
 */

namespace api\common\helpers\validators;

use Yii;
use api\models\Signature;


class VerificationValidator extends Validator {
    
	public function validate( $data, $rules ) {
		if ( is_array($data) && is_array($rules) ) {
			$names = $rules[0];
			foreach ( $names as $name ) {
				if (YII_ENV== 'prod' &&  array_key_exists($name, $data) ) {
                    //签名,测试环境不用签名
                    if ($data[$name]!=Signature::check_single_signature($data)) {
                        $this->addError( $name, "$name 认证失败" );
                    }
				}
			}
		}
		return $this->error;
	}
}
