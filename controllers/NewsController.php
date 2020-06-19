<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\EntryForm;

class NewsController extends Controller
{
    public $layout = 'basic';

    public function actionAll()
    {
        return $this->render('index');
    }
}