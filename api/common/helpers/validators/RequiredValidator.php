<?php
/**
 * @link 
 * @copyright Copyright (c)
 * @license 
 */

namespace common\helpers\validators;

use Yii;

/**
 * 必须项目验证器
 * 验证对应的参数值项目是否存在且不未空
 */
class RequiredValidator extends Validator {
	
	/**
	 * 校验数据
	 * @param array $data					需要校验的数据
	 * @param array $rules					校验规则
	 * @return array 
	 */
	public function validate( $data, $rules ) {
		if ( is_array($data) && is_array($rules) ) {
			$names = $rules[0];
			$requireValue = array_key_exists(2, $rules) ? $rules[2] : null;
			$message = null;
			if ( $requireValue === null ) {
				$message = '{name} cannot be blank.';
			} else if ( is_array($requireValue) ) {
				$message = '{name} must be in ';
				$vals = '';
				foreach ( $requireValue as $val ) {
					if ( $vals != '' ) {
						$vals .= ',';
					}
					$vals .= "\"$val\"";
				}
				$message .= $vals . '.';
			} else {
				$message = "{name} must be \"$requiredValue\".";
			}
			
			foreach ( $names as $name ) {
				if ( !array_key_exists($name, $data) || $data[$name] === '' ) {
					$this->addError( $name, str_replace('{name}', $name, $message) );
				} else if ( $requireValue != null ) {
					if ( is_array($requireValue) ) {
						if ( !in_array($data[$name], $requireValue) ) {
							$this->addError( $name, str_replace('{name}', $name, $message) );
						}
					} else if ( $data[$name] != $requireValue ) {
						$this->addError( $name, str_replace('{name}', $name, $message) );
					}
				}
			}
		}
		
		return $this->error;
	}
}
