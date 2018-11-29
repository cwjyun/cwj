<?php
/**
 * @link 
 * @copyright Copyright (c)
 * @license 
 */

namespace api\common\helpers\validators;

use Yii;

/**
 * 整型数值验证器
 * 验证对应的参数值是否为整数类型
 */
class IntegerValidator extends Validator {
	
	public $integerPattern = '/^\s*[+-]?\d+\s*$/';
	
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
						$this->addError( $name, "$name must be an integer." );
					}
				}
			}
		}
		
		return $this->error;
	}
}
