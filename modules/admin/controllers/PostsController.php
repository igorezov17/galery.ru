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
    /**
     * Undocumented function
     *
     * @return void
     * 
     * домтуп к измению статьи имеет только админ и контент менеджер
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'edit', 'update', 'delete'],
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
        return $this->render('index', ['posts' => $posts]);
    }

    /**
     * Undocumented function
     *
     * @return void
     * Создание нового поста
     */
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


    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     * 
     * Изменение существующего поста
     */
    public function actionUpdate($id)
    {
        $model = new PostValid();
        $image = UploadedFile::getInstances($model, 'image');
        $data = Yii::$app->request->post();
        if ($model->load(Yii::$app->request->post()) && $model->image = $image[0]->name)
        {
            $model->updatePost($id);
            Yii::$app->session->setFlash('success', 'Пост успешно обновлен');
            return $this->redirect('/admin/posts');
        }
        return $this->render('update', ['model' => $model]);
    }


    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     * 
     * удаление текущего поста
     */
    public function actionDelete($id)
    {
        $rezult = PostValid::deletePost($id);
        return $this->redirect('/admin/posts/index');
    }
  
}
