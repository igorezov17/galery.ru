<?php

namespace app\modules\admin;

/**
 * admin module definition class
 */
class dmn extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';
    public $layout = 'adminmain.php';
    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
