<?php
/**
 * @link 
 * @copyright Copyright (c)
 * @license 
 */

namespace api\common\helpers\validators;

use Yii;

/**
 * URL地址格式验证器
 * 验证对应的参数值是否为正确的IP地址格式
 */
class UrlValidator extends Validator {

    private  $validSchemes = ['http', 'https'];
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
					if (!in_array(substr($data[$name],0,4),$this->validSchemes)) {
						$this->addError( $name, $name.'必须带'.substr($data[$name],0,4).'全路径.' );
					}
				}
			}
		}
		return $this->error;
	}
}
