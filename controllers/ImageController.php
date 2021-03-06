<?php 

namespace app\controllers;

use Yii;
use app\models\Image\Category;
use app\models\Image\Photos;
use app\models\Image;
use yii\web\UploadedFile;
use yii\web\Controller;
use app\models\admin\images\ImageFrm;
use app\models\Image\ImageValid;
use app\models\login\valid;
use yii\filters\AccessControl;

class ImageController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'download', 'user-image', 'create', 'delete', 'download', 'ratota'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index', 'view', 'download'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                ],
            ]
        ];
    }
    /**
     * Главная страница 
     */
    public function actionIndex()
    {
        $image = new Photos();
        $images = $image->getAllImage();        
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
        $userimage = $image->userImage(Yii::$app->user->id);
        return $this->render('getimage', ['image' => $photo, 'userimage'=>$userimage]);
    }

    /**
     * Undocumented function
     * Изображения загруженные текущим пользователем
     * @return void
     */
    public function actionUserImage()
    {
        $model = new Image();
        $images = $model->getImageUser(Yii::$app->user->id);
        return $this->render('userimage', ['images' => $images]);
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
        if (Yii::$app->request->isPost)
        {
            if($model->load(Yii::$app->request->post())  && $model->image = $image[0]->name)
            {
                $model->saveimage(Yii::$app->user->id, $categori['category_id'], $image);
                return $this->redirect('/image/user-image');
            }
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
     * Скачивание изображения
     * @param [type] $id
     * @return void
     */
    public function actionDownload($id)
    {
        $model = new Photos();
        $image = $model->getOne($id);
        $path = './uploads/'.$image->image;
        header('Content-Type:'.pathinfo($path, PATHINFO_EXTENSION));
        header('Content-Disposition: filename='.$path);
        return readfile($path);
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
    }

}