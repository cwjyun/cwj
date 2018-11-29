<?php

namespace common\helpers;

use Yii;
use common\Result;
use common\ErrorCode;


class ValidateHelper {
	
	 public static $builtInValidators = [
        'boolean' => 'common\helpers\validators\BooleanValidator',
        'captcha' => 'common\helpers\validators\CaptchaValidator',
        'compare' => 'common\helpers\validators\CompareValidator',
        'date' => 'common\helpers\validators\DateValidator',
        'datetime' => 'common\helpers\validators\DatetimeValidator',
        'time' => 'common\helpers\validators\TimeValidator',
        'double' => 'common\helpers\validators\DoubleValidator',
        'email' => 'common\helpers\validators\EmailValidator',
        'exist' => 'common\helpers\validators\ExistValidator',
        'file' => 'common\helpers\validators\FileValidator',
        'image' => 'common\helpers\validators\ImageValidator',
        'match' => 'common\helpers\validators\RegularExpressionValidator',
        'number' => 'common\helpers\validators\NumberValidator',
        'required' => 'common\helpers\validators\RequiredValidator',
        'string' => 'common\helpers\validators\StringValidator',
        'url' => 'common\helpers\validators\UrlValidator',
        'ip' => 'common\helpers\validators\IpValidator',
		'integer' => 'common\helpers\validators\IntegerValidator',
		'ip' => 'common\helpers\validators\IpValidator',
		'numeric' => 'common\helpers\validators\NumericValidator',
        'verification' => 'common\helpers\validators\VerificationValidator',
    ];
	
	/**
	 * 校验数据
	 * @param array $data					需要校验的数据
	 * @param array $rules					校验规则
	 * @return Result 
	 */
	public static function validate( $data, $rules ) {
		$ret = new Result();
		$returnError = [];
		if ( is_array($data) && is_array($rules) ) {
			foreach ( $rules as $rule ) {
				$built = $rule[1];
				$refClass = new \ReflectionClass( self::$builtInValidators[$built] );
				$validator = $refClass->newInstance();
				$error = $validator->validate( $data, $rule );
				if ( $error ) {
					$returnError = array_merge_recursive( $returnError, $error );
				}
			}
		}
		
		if ( count($returnError) > 0 ) {
			$ret->code = ErrorCode::REQUEST_PARAMS_INVALID;
			$ret->message = $returnError;
		}
		
		return $ret;
	}
}
