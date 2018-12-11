<?php

namespace api\common\helpers;

use Yii;
use api\common\Result;
use api\common\ErrorCode;


class ValidateHelper {
	
	 public static $builtInValidators = [
        'boolean' => 'api\common\helpers\validators\BooleanValidator',
        'captcha' => 'api\common\helpers\validators\CaptchaValidator',
        'compare' => 'api\common\helpers\validators\CompareValidator',
        'date' => 'api\common\helpers\validators\DateValidator',
        'datetime' => 'api\common\helpers\validators\DatetimeValidator',
        'time' => 'api\common\helpers\validators\TimeValidator',
        'double' => 'api\common\helpers\validators\DoubleValidator',
        'email' => 'api\common\helpers\validators\EmailValidator',
        'exist' => 'api\common\helpers\validators\ExistValidator',
        'file' => 'api\common\helpers\validators\FileValidator',
        'image' => 'api\common\helpers\validators\ImageValidator',
        'match' => 'api\common\helpers\validators\RegularExpressionValidator',
        'number' => 'api\common\helpers\validators\NumberValidator',
        'required' => 'api\common\helpers\validators\RequiredValidator',
        'string' => 'api\common\helpers\validators\StringValidator',
        'url' => 'api\common\helpers\validators\UrlValidator',
        'ip' => 'api\common\helpers\validators\IpValidator',
		'integer' => 'api\common\helpers\validators\IntegerValidator',
		'ip' => 'api\common\helpers\validators\IpValidator',
		'numeric' => 'api\common\helpers\validators\NumericValidator',
        'verification' => 'api\common\helpers\validators\VerificationValidator',
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
