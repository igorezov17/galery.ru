<?php 

namespace app\controllers;

use app\models\image\Category;
use app\models\image\Photos;
use Yii;
//use yii\base\Controller;
use yii\web\Controller;

use Photos as GlobalPhotos;

class ImageController extends Controller
{
    //public $layout = 'galer';

    public function actionIndex()
    {
        $image = new Photos();
        $images = $image->getAllImage();
        
        return $this->render('index', ['images' => $images]);
    }

    public function actionView($id)
    {

        //$photos = Photos::getAllImage();
        $photo = Photos::getOne($id);
        $categories = Category::getAllCategory();
        $this->view->params['customParam'] = $categories;
        return $this->render('getimage', ['image' => $photo]);
    }

    public function actionUserImage()
    {
        $images = Photos::find()->all();

        return $this->render('userimage', ['images' => $images]);
    }

    public function actionUpdate($id)
    {
        var_dump($id);
        die;
    }

    public function actionCreate()
    {
        return $this->render('create');
    }


}