<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\Image;
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
        // var_dump($model);
        // die;
        return $this->render('edit', ['model' => $model]);
    }

    public function actionUpdate()
    {
        $model = new ImageFrm();
        // var_dump($model);
        // die;
        return $this->render('update', ['model' => $model]);
    }

    
}
