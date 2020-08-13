<?php

namespace app\controllers;

use Yii;
use app\models\News;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;


class NewsController extends Controller
{

    /**
    * Вывод всех новостей
    */
    public function actionIndex()
    {
        $news = new News;
        $posts = News::getAll();
        return $this->render('index', ['news' => $posts]);
    }
}