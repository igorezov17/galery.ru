<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\models\Image;

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

    
}
