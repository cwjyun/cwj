<?php

namespace backend\common;

use Yii;

class CommonClass
{
    static $list;

    /**
     * @param $title 邮件标题
     * @param $data  邮件内容
     * @return bool
     */
    public static function ErrorSendMail($title, $data)
    {
        $mail = Yii::$app->mailer->compose();
        $mail->setTo(\Yii::$app->params['adminEmail']);
        $mail->setFrom([\Yii::$app->params['mailerUserName'] => 'error_notice']);
        $mail->setSubject($title);
        $mail->setHtmlBody('<pre>' . var_export($data, true) . '</pre>');    //发布可以带html标签的文本
        $success = $mail->send();
        return $success;
    }


    public static function ajax_success($data = [], $custom = [])
    {
        exit(json_encode(array('code' => 1, 'data' => $data) + $custom, JSON_UNESCAPED_UNICODE));
    }


    public static function ajax_error($data = [], $custom = [])
    {
        exit(json_encode(array('code' => 0, 'data' => $data) + $custom, JSON_UNESCAPED_UNICODE));
    }


    public static function set_aign($data)
    {
        return Yii::$app->Ras->encrypt($data);
    }


    /**
     * 无限极分类         1 0
     *                    2 0
     *                    3 0
     *
     *                    4 1
     *                    5 2
     *                    6 3
     *
     *                    7 1
     *                    8 1
     * @param $items
     * @return array
     */
    public static function genTreeSort($data, $num = 0)
    {
        foreach ($data as $v) {
            $arr = $v;
            unset($arr['son']);
            $num = $num + 1;
            $num = $v['pid'] == 0 ? 1 : $num;
            $arr ['num'] = $num;
            self::$list [] = $arr;
            if (isset($v['son']) && is_array($v['son'])) {
                self:: genTreeSort($v['son'], $num);
            }
        }
    }


    /**
     * 无限极分类
     * @param $items
     * @return array
     */
    public static function genTree($items)
    {
        $array = [];
        foreach ($items as $k => $v) {
            $array[$v['id']] = $v;
        }
        foreach ($array as $item)
            $array[$item['pid']]['son'][$item['id']] = &$array[$item['id']];
        return isset($array[0]['son']) ? $array[0]['son'] : array();
    }


    public static function int_key_array($data, $pid = 0)
    {
        static $array = [];
        $i = 0;
        foreach ($data as $k => $v){
            $i++;
            $array[$i] = $v;
            if(isset($arrat[$i]['son']) || !empty($arrat[$i]['son'])){
                self::int_key_array($arrat[$i]['son'],$v['id']) ;
            }
        }
        return $array;
    }

}

?>