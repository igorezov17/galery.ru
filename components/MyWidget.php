<?php

namespace app\components;
use yii\base\Widgets;

class MyWidget extends Widgets
{
    public function run()
    {
        return "<h1>Привет мир </h1>";
    }
}