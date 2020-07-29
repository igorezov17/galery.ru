<?php

namespace app\modules\admin\controllers;

use app\models\News;
use yii\web\Controller;

/**
 * Default controller for the `admin` module
 */
class PostsController extends Controller
{


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
  
}
