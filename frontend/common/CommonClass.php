<?php

namespace app\common;

use Yii;
use linslin\yii2\curl\Curl;

class CommonClass
{


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
            //self::ErrorSendMail('没有API URL地址', $sendmailContent);
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
        print_r($sendmailContent);
        die();
        //self::ErrorSendMail($responseCode, $sendmailContent);
        //---+++++++++++++----}}
        return false;
    }

    public static function getToken()
    {
        $get_token = Yii::$app->params['wechat_api']['getToken'];
        return self::postCurl_system($get_token,[],'GET');
    }


}

?>