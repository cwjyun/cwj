<?php
namespace app\common\widgets;


use app\common\CommonClass;
use yii\base\Widget;


class header extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $data = CommonClass::get_nav();
         if(!$data){
             die("未获取到网站头部");
         }
        return $this->render('header',$data);
    }
}