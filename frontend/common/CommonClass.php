<?php

namespace app\common;

use Yii;
use linslin\yii2\curl\Curl;

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

    /**
     * 语料库api get请求
     * @param string $str_url
     * @param array $arr_post_data
     * @return bool|array|string
     * $callback_json=1代表返回所有接口返回json
     */
    public static function getCurlByCorpus($str_url, $arr_post_data = '', $callback_json = 0)
    {
        $obj_curl = new Curl();

        $obj_curl->setOption(CURLOPT_SSL_VERIFYPEER, FALSE)
            ->setOption(CURLOPT_SSL_VERIFYHOST, FALSE)
            ->setOption(CURLOPT_HEADER, 0)
            ->setOption(CURLOPT_CONNECTTIMEOUT, 20)
            ->setOption(CURLOPT_TIMEOUT, 20);
        //验签

        try {
            $obj_curl->setOption(CURLOPT_HTTPHEADER, [
                'Content-Type: application/x-www-form-urlencoded'
            ]);;
            $str_result = $obj_curl->get($str_url . '?' . http_build_query($arr_post_data));

            $responseCode = $obj_curl->responseCode;
            if ($responseCode == 200) {
                $arr_result = json_decode($str_result, true);
                return $arr_result['data'];
            }
            $sendmailArr = [];
            $sendmailArr['Host'] = \Yii::$app->request->getHostInfo() . \Yii::$app->request->getUrl();
            $sendmailArr['Api.function'] = __FUNCTION__;
            $sendmailArr['Api_url'] = $str_url;
            $sendmailArr['Http_code'] = $responseCode;
            $sendmailArr['Api_method'] = 'post';
            $sendmailArr['Api_post_data'] = $arr_post_data;
            $sendmailArr['Api_return'] = $str_result;
            self::ErrorSendMail($responseCode, $sendmailArr);
            return false;

        } catch (\Exception $e) {
            $sendmailArr = [];
            $sendmailArr['Host'] = \Yii::$app->request->getHostInfo() . \Yii::$app->request->getUrl();
            $sendmailArr['Api.function'] = __FUNCTION__;
            $sendmailArr['Http_code'] = $responseCode;
            $sendmailArr['GetMessage'] = $e->getMessage();
            $sendmailArr['Exception'] = $e;
            self::ErrorSendMail('try catch eror!', $sendmailArr);
            return false;
        }
    }



    /**curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Content-Type: application/x-www-form-urlencoded','LoginModel:2' ) );
     * CURL POST方式
     * @param string $url URL地址
     * @param array $data 参数
     * @$method string [POST,GET] 参数
     * @$header array 头参数 ，默认[Authorization=>'668b2d6b-c321-46b1-aee9-ec87d3a90d63']
     * @$method int  $IsLogin 是否是登录接口 true=登录
     * @return array $result
     */
    //登录时候走这个接口---YII自带curl配置
    public static function postCurl_system($url, $data = [], $method = 'POST', $header = array(), $IsLogin = false)
    {//get https的内容
        if (!$url) {
            //进入发送邮件内容--{{
            $sendmailArr = [];
            $sendmailArr['Host'] = \Yii::$app->request->getHostInfo() . \Yii::$app->request->getUrl();
            $sendmailArr['Api.function'] = __FUNCTION__;
            $sendmailArr['Api.Net_Url'] = $url;
            $sendmailArr['Api.Net_Method'] = $method;
            $sendmailArr['Api.Net_Header'] = json_encode($header);
            $sendmailArr['Api.Net_PostData'] = json_encode($data);
            $sendmailArr['ExecTime'] = date('Y-m-d H:i:s');
            $sendmailContent = $sendmailArr;
            self::ErrorSendMail('没有获取到地址', $sendmailContent);
            //---+++++++++++++----}}
            return false;
        }
        //如果session是空的，转登录
        if (!empty($data)) {
            $dataPara = http_build_query($data);
        }
        if (empty($header)) {
            $header[] = 'Content-Type: application/json';
            $header[] = 'cache-control: no-cache';
            $header[] = 'Authorization:' . \Yii::$app->session['teacher_info']['Authorization'];
            $header[] = 'UserId:' . \Yii::$app->session['teacher_info']['UserId'];
        }
        if (strtoupper($method) == 'GET' && !empty($dataPara)) {
            $url = $url . '?' . $dataPara;
        }
        $curl = new Curl();
        $curl->setOption(CURLOPT_SSL_VERIFYPEER, FALSE)
            ->setOption(CURLOPT_SSL_VERIFYHOST, FALSE)
            ->setOption(CURLOPT_HEADER, 0)
            ->setOption(CURLOPT_CONNECTTIMEOUT, 20)
            ->setOption(CURLOPT_TIMEOUT, 20);
        if (strtoupper($method) == 'POST') {
            if ($IsLogin) {
                $curl->setOption(CURLOPT_POSTFIELDS, $dataPara)
                    ->setOption(CURLOPT_HTTPHEADER, $header)
                    ->post($url);
            } else {
                $dataPara = json_encode($data);
                $curl->setOption(CURLOPT_POSTFIELDS, $dataPara)
                    ->setOption(CURLOPT_HTTPHEADER, $header)
                    ->post($url);
            }
        } else {
            $curl->setOption(CURLOPT_HTTPHEADER, $header)
                ->get($url);
        }
        $responseCode = $curl->responseCode;
        $result = $curl->response;
        //successful 请求已成功，请求所希望的响应头或数据体将随此响应返回
        if ($responseCode == 200) {
            $result = json_decode($result, true);
            return $result;
        }
        if ($responseCode == 400 && strpos($result, '用户名或者密码错误') !== false) {
            return false;
        }
        if ($responseCode == 401 && strpos($result, '令牌已过期') !== false) {
            return false;
        }
        //进入发送邮件内容--{{
        $sendmailArr = [];
        $sendmailArr['Host'] = \Yii::$app->request->getHostInfo() . \Yii::$app->request->getUrl();
        $sendmailArr['Api.function'] = __FUNCTION__;
        $sendmailArr['Api.Net_Url'] = $url;
        $sendmailArr['Api.Net_Method'] = $method;
        $sendmailArr['Api.Net_Header'] = json_encode($header);
        $sendmailArr['Api.Net_PostData'] = json_encode($data);
        $sendmailArr['Api.Net_ReturnHttpCode'] = $responseCode;
        $sendmailArr['Api.Net_Return'] = $result;
        $sendmailArr['ExecTime'] = date('Y-m-d H:i:s');
        $sendmailContent = $sendmailArr;
        self::ErrorSendMail($responseCode, $sendmailContent);
        //---+++++++++++++----}}
        return false;
    }


    /**curl_setopt($ch, CURLOPT_HTTPHEADER, array ('Content-Type: application/x-www-form-urlencoded','LoginModel:2' ) );
     * CURL POST方式
     * @param string $url URL地址
     * @param array $data 参数
     * @$method string [POST,GET] 参数
     * @$header array 头参数 ，默认[Authorization=>'668b2d6b-c321-46b1-aee9-ec87d3a90d63']
     * @$method int  $IsLogin 是否是登录接口 true=登录
     * @return array $result
     */
    //登录时候走这个接口---YII自带curl配置
    public static function CurlSystem($url, $data = [], $method = 'POST', $header = array(), $IsLogin = false)
    {//get https的内容
        if (!$url) {
            //进入发送邮件内容--{{
            $sendmailArr = [];
            $sendmailArr['Host'] = \Yii::$app->request->getHostInfo() . \Yii::$app->request->getUrl();
            $sendmailArr['Api.function'] = __FUNCTION__;
            $sendmailArr['Api.Net_Url'] = $url;
            $sendmailArr['Api.Net_Method'] = $method;
            $sendmailArr['Api.Net_Header'] = json_encode($header);
            $sendmailArr['Api.Net_PostData'] = json_encode($data);
            $sendmailArr['ExecTime'] = date('Y-m-d H:i:s');
            $sendmailContent = $sendmailArr;
            self::ErrorSendMail('没有API URL地址', $sendmailContent);
            //---+++++++++++++----}}
            return false;
        }
        //如果session是空的，转登录
        if (!empty($data)) {
            $dataPara = http_build_query($data);
        }
        if (empty($header)) {
            $header[] = 'Content-Type: application/json';
            $header[] = 'cache-control: no-cache';
        }
        if (strtoupper($method) == 'GET' && !empty($dataPara)) {
            $url = $url . '?' . $dataPara;
        }
        $curl = new Curl();
        $curl->setOption(CURLOPT_SSL_VERIFYPEER, FALSE)
            ->setOption(CURLOPT_SSL_VERIFYHOST, FALSE)
            ->setOption(CURLOPT_HEADER, 0)
            ->setOption(CURLOPT_CONNECTTIMEOUT, 20)
            ->setOption(CURLOPT_TIMEOUT, 20);
        if (strtoupper($method) == 'POST') {
            if ($IsLogin) {
                $curl->setOption(CURLOPT_POSTFIELDS, $dataPara)
                    ->setOption(CURLOPT_HTTPHEADER, $header)
                    ->post($url);
            } else {
                $dataPara = json_encode($data);
                $curl->setOption(CURLOPT_POSTFIELDS, $dataPara)
                    ->setOption(CURLOPT_HTTPHEADER, $header)
                    ->post($url);
            }
        } else {
            $curl->setOption(CURLOPT_HTTPHEADER, $header)
                ->get($url);
        }

        $responseCode = $curl->responseCode;
        $result = $curl->response;
        //successful 请求已成功，请求所希望的响应头或数据体将随此响应返回
        if ($responseCode == 200) {
            $result = json_decode($result, true);
            if (!$result['code']) {
                self::ErrorSendMail('接口报错', $result);
            }
            return $result;
        }
        if ($responseCode == 400 && strpos($result, '用户名或者密码错误') !== false) {
            return false;
        }
        if ($responseCode == 401 && strpos($result, '令牌已过期') !== false) {
            return false;
        }
        //进入发送邮件内容--{{
        $sendmailArr = [];
        $sendmailArr['Host'] = \Yii::$app->request->getHostInfo() . \Yii::$app->request->getUrl();
        $sendmailArr['Api.function'] = __FUNCTION__;
        $sendmailArr['Api.Net_Url'] = $url;
        $sendmailArr['Api.Net_Method'] = $method;
        $sendmailArr['Api.Net_Header'] = json_encode($header);
        $sendmailArr['Api.Net_PostData'] = json_encode($data);
        $sendmailArr['Api.Net_ReturnHttpCode'] = $responseCode;
        $sendmailArr['Api.Net_Return'] = $result;
        $sendmailArr['ExecTime'] = date('Y-m-d H:i:s');
        $sendmailContent = $sendmailArr;
        self::ErrorSendMail($responseCode, $sendmailContent);
        //---+++++++++++++----}}
        return false;
    }


    /**
     * 获取控制器的一个基本配置参数
     * @return mixed
     */
    public static function get_basics_info()
    {
        $basics = Yii::$app->params['basics_info'];
        $controller = Yii::$app->controller->id;
        $action = Yii::$app->controller->action->id;
        return $basics[$controller][$action];
    }

    public static function ajax_success($data = [], $custom = [])
    {
        exit(json_encode(array('code' => 1, 'data' => $data) + $custom, JSON_UNESCAPED_UNICODE));
    }


    public static function ajax_error($data = [], $custom = [])
    {
        exit(json_encode(array('code' => 0, 'data' => $data) + $custom, JSON_UNESCAPED_UNICODE));
    }

    /**
     * 获取接口过得来post或者get数据
     * @return array|mixed|null
     */
    public static function get_api_data()
    {
        $input = null;
        if (!empty (file_get_contents('php://input'))) {
            $input = json_decode(file_get_contents('php://input'), true);
        }
        if (!is_array($input)) {
            $input = Yii::$app->request->bodyParams;
        }
        return $input;
    }

    /**
     * 登录接口
     * @param $data
     */
    public static function login($data)
    {
        $data['RasKey'] = \Yii::$app->params['RasKey'];
        $json = json_encode($data);
        $data['sign'] = self::set_aign($json);
        $url = Yii::$app->params['login'];
        return self::postCurl_system($url, $data);
    }

    /**
     * 用户注册接口
     * @param $data
     */
    public static function reg($data)
    {
        $data['RasKey'] = \Yii::$app->params['RasKey'];
        $json = json_encode($data);
        $data['sign'] = self::set_aign($json);
        $url = Yii::$app->params['reg'];
        return self::postCurl_system($url, $data);
    }


    public static function set_aign($data)
    {
        return Yii::$app->Ras->encrypt($data);
    }

    /**
     * 调用nav接口
     * @return bool|mixed
     */
    public static function get_nav()
    {
        $data['RasKey'] = \Yii::$app->params['RasKey'];
        $json = json_encode($data);
        $data['sign'] = self::set_aign($json);
        $url = Yii::$app->params['nav'];
        $res = self::postCurl_system($url, $data);
        if ($res['code'] == 1) {
            return $res['data'];
        }
        return false;
    }
}

?>