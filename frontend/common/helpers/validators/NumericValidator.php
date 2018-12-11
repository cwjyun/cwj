<?php

namespace api\common\helpers\validators;

use Yii;

/**
 * 数值型参数验证器
 */
class NumericValidator extends Validator {
	
	public $integerPattern = '/^\s*[+-]?\d+(\.[0-9]+)?\s*$/';
	
	/**
	 * 校验数据
	 * @param array $data					需要校验的数据
	 * @param array $rules					校验规则
	 * @return array 
	 */
	public function validate( $data, $rules ) {
		if ( is_array($data) && is_array($rules) ) {
			$names = $rules[0];
			foreach ( $names as $name ) {
				if ( array_key_exists($name, $data) ) {
					if ( $data[$name] != '' && preg_match($this->integerPattern, $data[$name]) <= 0 ) {
						$this->addError( $name, "$name 必须是数值类型." );
					}
				}
			}
		}
		
		return $this->error;
	}
}