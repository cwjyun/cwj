<?php

namespace app\module\dome;

/**
 * Module module definition class
 */
class dome extends \yii\base\Module
{
    public $layout = 'main.php';
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\module\dome\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
