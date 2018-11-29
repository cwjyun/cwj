<?php

namespace app\common;

use Yii;
use linslin\yii2\curl\Curl;

class CommonClass
{


    /**
     * 语料库api get请求
     * @param string $str_url
     * @param array $arr_post_data
     * @return bool|array|string
     * $callback_json=1代表返回所有接口返回json
     */
    public static function getCurlByCorpus($str_url, $arr_post_data='',$callback_json=0)
    {
        $obj_curl = new Curl();

        $obj_curl->setOption(CURLOPT_SSL_VERIFYPEER, FALSE)
            ->setOption(CURLOPT_SSL_VERIFYHOST, FALSE)
            ->setOption(CURLOPT_HEADER, 0)
            ->setOption(CURLOPT_CONNECTTIMEOUT, 20)
            ->setOption(CURLOPT_TIMEOUT, 20);

        try {
            $obj_curl->setOption(CURLOPT_HTTPHEADER, [
                'Content-Type: application/x-www-form-urlencoded'
            ]);

            $str_result  = $obj_curl->get($str_url . '?' . http_build_query($arr_post_data));
            $responseCode = $obj_curl->responseCode;
            if ($responseCode == 200) {
                $arr_result  = json_decode($str_result, true);
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
            //self::ErrorSendMail($responseCode, $sendmailArr);
            return false;

        } catch ( \Exception $e ) {
            $sendmailArr = [];
            $sendmailArr['Host'] = \Yii::$app->request->getHostInfo() . \Yii::$app->request->getUrl();
            $sendmailArr['Api.function'] = __FUNCTION__;
            $sendmailArr['Http_code'] = $responseCode;
            $sendmailArr['GetMessage'] = $e->getMessage();
            $sendmailArr['Exception'] = $e;
            //self::ErrorSendMail('try catch eror!', $sendmailArr);
            return false;
        }
    }


    public static function getOpid()
    {
        $get_token = Yii::$app->params['wechat_api']['get_opid'];
        $rs = self::getCurlByCorpus($get_token, ['url' => 'www.baidu.com'], 'GET', 0);
        if ($rs['code'] != 1) return false;
        $url =$rs['msg'];

    }


}

?>