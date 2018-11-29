<?php
/**
 * @link 
 * @copyright Copyright (c)
 * @license 
 */

namespace common\helpers\validators;

use Yii;

/**
 * 日期型数值验证器
 * 验证对应的参数值是否为日期类型，同时是否符合所指定的日期格式
 */
class DateValidator extends Validator {
	
	const DATE_FORMAT_DEFAULT = 'Y-m-d H:i:s';
	
	private $timeZone;
	
	public function __construct() {
		if ( $this->timeZone === null ) {
            $this->timeZone = Yii::$app->timeZone;
        }
	}
	
	/**
	 * 校验数据
	 * @param array $data					需要校验的数据
	 * @param array $rules					校验规则
	 * @return array 
	 */
	public function validate( $data, $rules ) {
		if ( is_array($data) && is_array($rules) ) {
			$names = $rules[0];
			$format = array_key_exists('format', $rules) ? $rules['format'] : self::DATE_FORMAT_DEFAULT;
			foreach ( $names as $name ) {
				if ( array_key_exists($name, $data) ) {
					if ( !$this->check($data[$name], $format) ) {
						$this->addError( $name, "The format of $name is invalid." );
					}
				}
			}
		}
		
		return $this->error;
	}
	
	/**
	 * 日期校验
	 * @param string $date					日期
	 * @param string format					日期格式
	 * @return boolean						校验通过返回TRUE，未通过返回FALSE
	 */
	private function check( $date, $format ) {
		$isOK = false;
		$unixTime = strtotime( $date );
		if ( $unixTime && date($format, $unixTime) == $date ) {
			$isOK = true;
		}

		return $isOK;
	}
}
