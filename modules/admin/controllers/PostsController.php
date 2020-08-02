<?php

namespace app\modules\admin\controllers;

use app\models\News;
use yii\web\Controller;
use yii\filters\AccessControl;

/**
 * Default controller for the `admin` module
 */
class PostsController extends Controller
{


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'edit'],
                        'allow' => true,
                        'roles' => ['content', 'admin'],
                    ],
                ],
            ]
        ];
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $posts = News::getAll();
        //echo "Welcome In first in Admin";
        return $this->render('index', ['posts' => $posts]);
    }


    public function actionEdit()
    {

        $model = new News();
        return $this->render('edit', ['model' => $model]);
    }
  
}
