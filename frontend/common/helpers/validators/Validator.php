<?php

namespace app\common\helpers\validators;

use Yii;
use api\common\exception\NeedOverrideException;


class Validator {
	
	protected $error = [];
	
	/**
	 * 校验数据
	 * @param array $data					需要校验的数据
	 * @param array $rules					校验规则
	 * @return array 
	 */
	public function validate( $data, $rules ) {
		throw new NeedOverrideException( get_class($this) . ' does not support validate(), you should override it.' );
	}
	
	/**
	 * 添加验证未通过的错误消息
	 * @param string $name					验证未通过的字段名
	 * @param string $errorMessage			错误消息
	 */
	protected function addError( $name, $errorMessage ) {
		$this->error[$name][] = $errorMessage;
	}
}
