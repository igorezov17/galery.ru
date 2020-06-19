<?php

namespace app\controllers;

use yii\web\Controller;

class MyController extends Controller
{
    public function actionHellos()
    {
        return $this->render ('hellos');
    }

}