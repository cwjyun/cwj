<?php

namespace backend\common;

use Yii;

class CommonClass
{

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
}

?>