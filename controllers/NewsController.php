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
    //public $layout = 'basic';

    public function actionIndex()
    {
        $news = new News;
        //$posts = $news->getAllNews();
        $posts = News::getAll();
        // echo "<pre>";
        // print_r($posts);
        // echo "</pre>";
        // die;
        return $this->render('index', ['news' => $posts]);
    }
}