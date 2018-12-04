<?php

namespace api\common;

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
        exit(json_encode(array('data' => $data) + $custom, JSON_UNESCAPED_UNICODE));
    }


    public static function ajax_error($data = [], $custom = []){
        exit(json_encode(array('code'=>0,'data' => $data) + $custom, JSON_UNESCAPED_UNICODE));
    }

    /**
     * 获取接口过得来post或者get数据
     * @return array|mixed|null
     */
    public static function get_api_data(){
        $input = null;
        if (! empty ( file_get_contents('php://input') )) {
            $input = json_decode ( file_get_contents('php://input'), true );
        }
        if (! is_array ( $input )) {
            $input = Yii::$app->request->bodyParams;
        }
        return $input;
    }

    /**
     * 请求的接口保存日志
     */
    public static function save_log_api_date($url = '', $data)
    {

    }

}

?>