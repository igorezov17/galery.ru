<?php

namespace app\controllers;

use yii\base\Controller;

class RabController extends Controller
{
    public function actionTutty()
    {
        return $this->render("tutty");
    }
}