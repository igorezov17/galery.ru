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
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ]
        ];
    }

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