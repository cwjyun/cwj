<?php
/**
 * @link 
 * @copyright Copyright (c)
 * @license 
 */

namespace common\helpers\validators;

use Yii;

/**
 * IP地址格式验证器
 * 验证对应的参数值是否为正确的IP地址格式
 */
class IpValidator extends Validator {
	
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
					if ( $data[$name] != '' && !filter_var($data[$name], FILTER_VALIDATE_IP) ) {
						$this->addError( $name, "$name is not a valid ip." );
					}
				}
			}
		}
		
		return $this->error;
	}
}
