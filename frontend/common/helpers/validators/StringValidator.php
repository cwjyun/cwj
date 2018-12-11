<?php
/**
 * @link 
 * @copyright Copyright (c)
 * @license 
 */

namespace app\common\helpers\validators;

use Yii;

/**
 * 必须项目验证器
 * 验证对应的参数值项目是否存在且不未空
 */
class StringValidator extends Validator {

    private $min=null;
    private $max=null;
    /**
     * {@inheritdoc}
     */
    public function validate($data, $rules)
    {

        if ( is_array($data) && is_array($rules) ) {
            $this->min=$rules['length'][0];
            $this->max=$rules['length'][1];
            $names = $rules[0];
            foreach ( $names as $name ) {
                if ( array_key_exists($name, $data) ) {
                    $length = mb_strlen($data[$name], 'UTF-8');
                    if ( !is_string($data[$name]) ) {
                        $this->addError( $name, "$name must be an string." );
                    }
                    if ($this->min !== null && $length < $this->min) {
                        $this->addError($name, '最小min:'.$this->min);
                    }
                    if ($this->max !== null && $length > $this->max) {
                        $this->addError($name, '最大max:'.$this->max);
                    }
                }
            }
        }
        return $this->error;
    }
}
