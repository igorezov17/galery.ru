<?php 

namespace app\controllers;

use Yii;
use app\models\image\Category;
use app\models\image\Photos;
use app\models\Image;
use yii\web\UploadedFile;
use yii\web\Controller;
use app\models\admin\images\ImageFrm;
use app\models\image\ImageValid;
use app\models\login\Valid;
use Phar;

class ImageController extends Controller
{

    public function actionIndex()
    {
        $image = new Photos();
        $images = $image->getAllImage();

        //$sql = "SELECT users.usename as username, photos.title as imagename,  ";
        
        return $this->render('index', ['images' => $images]);
    }


    public function actionTest()
    {
        $model = new ImageFrm();
        echo $model->foo();
    }

    public function actionRatota($id)
    {
        $model = new Photos();
        $image = $model->getOne($id);
        // var_dump($image->image);
        // die;

        $path = '/uploads/'.$image->image;
  
// echo $path;
// die;
        $filename = $image->image;


        $source = imagecreatefromjpeg($path);

       $a=  imagerotate($source, 90, 0);

        imagejpeg($a, $path);
        return $this->redirect(['/image/user-image']);

// $img = imagecreatefromjpeg($image);    // Картинка
//     $degrees = 90;                         //Наклон картинки
//     $imgRotated = imagerotate($img, $degrees, 0);
//     imagejpeg($imgRotated, $new_image, 90); 
    }

    public function actionView($id)
    {

        //$photos = Photos::getAllImage();
        $photo = Photos::getOne($id);
        $categories = Category::getAllCategory();
        $image = new Photos();

        $userimage = $image->userImage(Yii::$app->user->getId());
        //$this->view->params['customParam'] = $categories;
        return $this->render('getimage', ['image' => $photo, 'userimage'=>$userimage]);
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
        $model = new ImageValid();
        $image = UploadedFile::getInstances($model, 'image');
        $categori = Yii::$app->request->post();
        Yii::$app->user->id;
        $category = $model->getCategory();
        // var_dump($categori['category_id']);
        // die;
        if($model->load(Yii::$app->request->post())  && $model->image = $image[0]->name)
        {
            $model->saveimage(Yii::$app->user->id, $categori['category_id']);
            //echo "oks";
            return $this->redirect(['/image/user-image']);
        }
    
        return $this->render('create', ['model' => $model, 'categories' => $category]);
    }

    public function actionDelete($id)
    {
        $model = new Photos();
        $model->deleteImage($id);
        return $this->redirect(['/image/user-image']);
    }


}