<?php

namespace app\controllers;

use Yii;
use yii\web\Controller; 
use app\models\forms\SignupForm;
use app\models\register\Sign;
use app\models\register\User1;

class RegisterController extends Controller
{
    public function actionSignup()
    {
        $model = new SignupForm();
        return $this->render('signup', ['model' => $model]);
    }

    /*public function actionIndex()
    {

        return $this->render('index');
    }*/

    public function actionLogin()
    {

        return $this->render('login');
    }

    public function actionReg()
    {

        $model = new Sign(); // необходимо для формирования формы

        if (isset($_POST))
        {
            //var_dump(Yii::$app->request->post('Sign'));
            //die;
            $model->attributes = Yii::$app->request->post('Sign');
            if($model->validate())
            {
                $model->sign();
                return $this->goHome();
            }
        } 
        return $this->render('reg', ['model' => $model]);
        
    }



}
