<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\Image;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use app\models\admin\images\ImageFrm;

/**
 * Default controller for the `admin` module
 */
class ImagesController extends Controller
{

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
     * Вывод всех изображений в админ панели
     * @return string
     */
    public function actionIndex()
    {
        $images = Image::getAll();
        return $this->render('index', ['images' => $images]);
    }

    /**
     * Undocumented function
     * Создание нового изображения
     * @return void
     */
    public function actionEdit()
    {
        $model = new ImageFrm();
        $image = UploadedFile::getInstances($model, 'image');
        if ($model->load(Yii::$app->request->post()) && $model->image = $image[0]->name)
        {
            if ($model->editObt())
            {
                Yii::$app->session->setFlash('success', 'Новый пост добавлен');
                return $this->redirect('/admin/images');
            } 
        }
        return $this->render('edit', ['model' => $model]);
    }

    /**
     * Undocumented function
     * Обновление изображения
     * @param [type] $id
     * @return void
     */
    public function actionUpdate($id)
    {
        $model = new ImageFrm();
        $image = UploadedFile::getInstances($model, 'image');
        $data = Yii::$app->request->post();
        if ($model->load(Yii::$app->request->post()) && $model->image = $image[0]->name)
        {
            if ($model->updateObt($id))
            {
                Yii::$app->session->setFlash('success', 'Изображение успешно обновлен');
                return $this->redirect('/admin/images');
            }
        }
        return $this->render('update', ['model' => $model]);
    }

    /**
     * Undocumented function
     * Удаление изображения
     * @param [type] $id
     * @return void
     */
    public function actionDelete($id)
    {
        $rezult = ImageFrm::deleteObt($id);
        return $this->redirect('/admin/images/index');
    }

    
}
