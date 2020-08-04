<?php

namespace app\modules\admin\controllers;

use Yii;
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
                        'actions' => ['index', 'edit'],
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
        // // var_dump($model->imageFiles);
        // // die;
        // // echo "<br>";
        // $model->username = 'мудак';
        

        if ($model->load(Yii::$app->request->post()) && $model->imageFiles=$image[0]->name )
        {

            if($model->save())
            {
                echo "OK";
            } else {
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

    
}
