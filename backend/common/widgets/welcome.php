<?php

namespace backend\common\widgets;

use Yii;
use yii\base\Widget;
use app\common\CommonClass;

class welcome extends Widget
{
    public function init()
    {
        parent::init();
    }


    public function run()
    {
        return $this->render('welcome');
    }

}

?>