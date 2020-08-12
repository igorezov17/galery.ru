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

class ImageController extends Controller
{
    /**
     * Главная страница 
     */
    public function actionIndex()
    {
        $image = new Photos();
        $images = $image->getAllImage();

        //$sql = "SELECT users.usename as username, photos.title as imagename,  ";
        
        return $this->render('index', ['images' => $images]);
    }

    /**
     * Undocumented function
     * Вывод одоного изображения
     * @param [type] $id
     * @return void
     */
    public function actionView($id)
    {
        $photo = Photos::getOne($id);
        $categories = Category::getAllCategory();
        $image = new Photos();
        $userimage = $image->userImage(Yii::$app->user->getId());
        return $this->render('getimage', ['image' => $photo, 'userimage'=>$userimage]);
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function actionUserImage()
    {
        $images = Photos::find()->all();
        return $this->render('userimage', ['images' => $images]);
    }

    public function actionSlide()
    {
        $model = Image::find()->all();

        return $this->render('slide', ['image', $model]);
    }

    /**
     * Создание нового изображения
     */
    public function actionCreate()
    {
        $model = new ImageValid();
        $image = UploadedFile::getInstances($model, 'image');
        $categori = Yii::$app->request->post();
        Yii::$app->user->id;
        $category = $model->getCategory();

        if($model->load(Yii::$app->request->post())  && $model->image = $image[0]->name)
        {
            $model->saveimage(Yii::$app->user->id, $categori['category_id']);
            return $this->redirect(['/image/user-image']);
        }
        return $this->render('create', ['model' => $model, 'categories' => $category]);
    }

    /**
     * Undocumented function
     * Удаление изображения
     * @param [type] $id
     * @return void
     */
    public function actionDelete($id)
    {
        $model = new Photos();
        $model->deleteImage($id);
        return $this->redirect(['/image/user-image']);
    }

    /**
     * Undocumented function
     * Поворот изображения
     * @param [type] $id
     * @return void
     */
    public function actionRatota($id)
    {
        $model = new Photos();
        $image = $model->getOne($id);
        $path = './uploads/'.$image->image;
        $filename = $image->image;
        $source = imagecreatefromjpeg($path);
        $new = imagerotate($source, 90, 0);
        imagejpeg($new, $path);
        return $this->redirect(['/image/user-image']);

        // $img = imagecreatefromjpeg($image);    // Картинка
        // $degrees = 90;                         //Наклон картинки
        // $imgRotated = imagerotate($img, $degrees, 0);
        // imagejpeg($imgRotated, $new_image, 90); 
    }

}