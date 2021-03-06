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
     * доступ к измению статьи имеет только админ и контент менеджер
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
     * Создание нового поста
     */
    public function actionEdit()
    {
        $model = new PostValid();
        $image = UploadedFile::getInstances($model, 'image');
        if (Yii::$app->request->isPost)
        {
            if ($model->load(Yii::$app->request->post()) && $model->image = $image[0]->name)
            {
                if ($model->editObt($image))
                {
                    Yii::$app->session->setFlash('success', 'Новый пост добавлен');
                    return $this->redirect('/admin/posts');
                } 
            }
        }
        return $this->render('edit', ['model' => $model]);
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * 
     * Изменение существующего поста
     */
    public function actionUpdate($id)
    {
        $model = new PostValid();
        $image = UploadedFile::getInstances($model, 'image');
        $data = Yii::$app->request->post();
        if (Yii::$app->request->isPost)
        {
            if ($model->load(Yii::$app->request->post()) && $model->image = $image[0]->name)
            {
                if ($model->updateObt($id, $image))
                {
                    Yii::$app->session->setFlash('success', 'Пост успешно обновлен');
                    return $this->redirect('/admin/posts');
                }
            }
        }
        return $this->render('update', ['model' => $model]);
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * 
     * удаление текущего поста
     */
    public function actionDelete($id)
    {
        $rezult = PostValid::deleteObt($id);
        return $this->redirect('/admin/posts/index');
    } 
}
