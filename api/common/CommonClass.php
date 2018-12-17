<?php

namespace api\common;

use Yii;
use api\models\log\Log;

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
        exit(json_encode(array('code'=>1,'data'=>$data) + $custom, JSON_UNESCAPED_UNICODE));
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
    public static function save_log_api_date($data, $error = '', $is_send_email = 0)
    {
        $data['url'] = Yii::$app->request->getHostInfo() . Yii::$app->request->url;
        $data['request'] = $error;
        $data['http_status'] = '500';
        $data['response'] = json_encode($data, true);
        $data['create_time'] = date("Y-m-d H:i:s");
        Log::save_log($data,1);
        if($is_send_email){
             self::ErrorSendMail('错误日志记录',$data);
             return true;
        }
        return true;
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

}

?>