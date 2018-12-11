<?php

namespace app\common\helpers;

use Yii;
use api\common\Result;
use api\common\ErrorCode;


class ValidateHelper {
	
	 public static $builtInValidators = [
        'boolean' => 'app\common\helpers\validators\BooleanValidator',
        'captcha' => 'app\common\helpers\validators\CaptchaValidator',
        'compare' => 'app\common\helpers\validators\CompareValidator',
        'date' => 'app\common\helpers\validators\DateValidator',
        'datetime' => 'app\common\helpers\validators\DatetimeValidator',
        'time' => 'app\common\helpers\validators\TimeValidator',
        'double' => 'app\common\helpers\validators\DoubleValidator',
        'email' => 'app\common\helpers\validators\EmailValidator',
        'exist' => 'app\common\helpers\validators\ExistValidator',
        'file' => 'app\common\helpers\validators\FileValidator',
        'image' => 'app\common\helpers\validators\ImageValidator',
        'match' => 'app\common\helpers\validators\RegularExpressionValidator',
        'number' => 'app\common\helpers\validators\NumberValidator',
        'required' => 'app\common\helpers\validators\RequiredValidator',
        'string' => 'app\common\helpers\validators\StringValidator',
        'url' => 'app\common\helpers\validators\UrlValidator',
        'ip' => 'app\common\helpers\validators\IpValidator',
		'integer' => 'app\common\helpers\validators\IntegerValidator',
		'ip' => 'app\common\helpers\validators\IpValidator',
		'numeric' => 'app\common\helpers\validators\NumericValidator',
        'verification' => 'app\common\helpers\validators\VerificationValidator',
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
