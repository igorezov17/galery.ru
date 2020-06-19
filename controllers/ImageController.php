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
    public $layout = 'galer';

    public function actionIndex()
    {
        $photos = Photos::getAllImage();
        $categories = Category::getAllCategory();
        $this->view->params['customParam'] = $categories;
        return $this->render('index', ['images' => $photos, 'category' => $categories]);
    }

    public function actionView($id)
    {

        //$photos = Photos::getAllImage();
        $photo = Photos::getOne($id);
        $categories = Category::getAllCategory();
        $this->view->params['customParam'] = $categories;
        return $this->render('getimage', ['image' => $photo]);
    }


}