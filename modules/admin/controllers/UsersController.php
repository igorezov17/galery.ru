<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\UploadedFile;
use yii\web\Controller;
use app\models\Users;
use app\models\forms\SignupForm;
use yii\filters\AccessControl;

/**
 * Default controller for the `admin` module
 */
class UsersController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'edit', 'delete'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ]
        ];
    }


    public function actionGetUserRole()
    {
        
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $users = Users::getAll();
        // echo "<pre>";
        // var_dump($users);
        // echo "</pre>";
        // die;
        //echo "Welcome In first in Admin";

        return $this->render('index', ['users' => $users]);
    }

    public function actionEdit()
    {
        $model = new SignupForm();
        $model->scenario = SignupForm::SCENARIO_ADMIN_CREATE;
        //$model->scenario = Users::SCENARIO_ADMIN_CREATE;
        $date = Yii::$app->request->post();
        $image = UploadedFile::getInstances($model, 'imageFiles');
        $model->imageFiles = $image[0]->name;
        $model->image = $image[0]->name;
        
        // // var_dump($model->imageFiles);
        // // die;
        // // echo "<br>";
        // $model->username = 'мудак';
        $data = Yii::$app->request->post('SignupForm');
        // $image = UploadedFile::getInstances($model, 'imageFiles');
        // echo "<pre>";
        // print_r($data['username']);
        // echo "</pre>";
        // var_dump($image[0]->name);

        $model->username = $data['username'];
        $model->email = $data['email'];
        $model->password = $data['password'];
        $model->image = $image[0]->name;
        // var_dump($model);
        // die;
        if($model->save())
        {
            echo "OK";
        } 
        else {
            echo 'Fuck';
        }
        die;


        if ($model->load(Yii::$app->request->post()) && $model->image = $image[0]->name && $model->imageFiles = $image[0]->name )
        {
           //var_dump($model);
            if($model->save())
            {
                echo "OK";
            } 
            else {
                echo 'Fuck';
            }
            // $img = $model->emptyImage();
            // var_dump($img);
            // die;

        }
        //  else {
        //     var_dump($model);
        //     echo "не прошел даже первую проверку";
        // }

        //if ($model->load(Yii::$app->request->post()));

        return $this->render('edit', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $rezult = SignupForm::delete($id);
        return $this->redirect('/admin/users');
    }
    
}
