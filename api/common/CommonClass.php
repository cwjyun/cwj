<?php

namespace app\common;

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

}

?>