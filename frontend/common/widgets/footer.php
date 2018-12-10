<?php
namespace app\common\widgets;


use yii\base\Widget;


class footer extends Widget
{
    public function init()
    {
        parent::init();
    }

    public function run()
    {
        return $this->render('footer');
    }
}