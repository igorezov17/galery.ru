<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\Image;
use yii\web\UploadedFile;
use app\models\admin\images\ImageFrm;

/**
 * Default controller for the `admin` module
 */
class ImagesController extends Controller
{


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $images = Image::getAll();
        //echo "Welcome In first in Admin";
        return $this->render('index', ['images' => $images]);
    }

    public function actionEdit()
    {
        $model = new ImageFrm();
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
        $model = new ImageFrm();
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
        $rezult = ImageFrm::deleteImage($id);
        return $this->redirect('/admin/images/index');
    }

    
}
