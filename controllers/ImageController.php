<?php 

namespace app\controllers;

use Yii;
use app\models\image\Category;
use app\models\image\Photos;
use app\models\Image;
use yii\web\UploadedFile;
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

    public function actionRatota($id)
    {
        $temp = tempnam(sys_get_temp_dir(), 'prefix');

        $data = Image::findOne($id);

        //define image path
        // $filename="image.jpg";

        // var_dump($data->filepath);
        // die;
        // Load the image
        $source = imagecreatefromjpeg($data->filepath);

        // Rotate
        $rotate = imagerotate($source, 90, 0);

        //and save it on your server...
        imagejpeg($rotate, $temp);
        // var_dump($data);exit();
        unlink($data->filepath);
        $data->filepath = 'uploads/'.md5_file($temp). '.' .$data->extension;
        rename($temp, $data->filepath); // системный вызов из ниоткуда в никуда

        $data->save();
        return $this->redirect(['userimage']);
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