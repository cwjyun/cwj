<?php
namespace app\common;

use Yii;
use yii\helpers\Url;
use yii\base\InvalidConfigException;

class MyUrlManager extends yii\web\UrlManager
{
    public $domainName;

    protected $_hostInfo;

    public function getProperDomain(){
        if ( ! isset($this->domainName) || empty($this->domainName) ) {
            throw new InvalidConfigException('Request requires a domain name to be configured!');
        }

        return $this->domainName;
    }

    public function getHostInfo(){

        if ($this->_hostInfo === null)
        {
            $secure = Yii::$app->getRequest()->getIsSecureConnection();
            $http = $secure ? 'https' : 'http';

            if (isset($_SERVER['HTTP_HOST'])) {
                $this->_hostInfo = $http . '://' . $this->getProperDomain();
            } elseif (isset($_SERVER['SERVER_NAME'])) {
                $this->_hostInfo = $http . '://' . $this->getProperDomain();
                $port = $secure ? $this->getSecurePort() : $this->getPort();

                if (($port !== 80 && !$secure) || ($port !== 443 && $secure)) {
                    $this->_hostInfo .= ':' . $port;
                }
            }
        }
        return $this->_hostInfo;
    }
}

?>