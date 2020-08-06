<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\News;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use app\models\admin\posts\PostValid;

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
                        'actions' => ['index', 'edit', 'update'],
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
        $model = new PostValid();
        $image = UploadedFile::getInstances($model, 'image');
        if (Yii::$app->request->post())
        {
            var_dump(Yii::$app->request->post());
            echo "<br>";
            var_dump($image[0]->name);
            die;
        }
        return $this->render('edit', ['model' => $model]);
    }


    public function actionUpdate($id)
    {
        $model = new PostValid();
        $image = UploadedFile::getInstances($model, 'image');
        if (Yii::$app->request->post())
        {
            var_dump(Yii::$app->request->post());
            echo "<br>";
            var_dump($image[0]->name);
            die;
        }
        return $this->render('update', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $rezult = PostValid::deletePost($id);
        return $this->redirect('/admin/posts/index');
    }
  
}
