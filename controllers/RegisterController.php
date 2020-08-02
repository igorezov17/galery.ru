<?php

namespace app\controllers;

use Yii;
use yii\web\Controller; 
use app\models\forms\SignupForm;


class RegisterController extends Controller
{

    public $layout = 'standart'; 

    public function actionSignUp()
    {

        $model = new SignupForm();
        $model->scenario = SignupForm::SCENARIO_REG;
        if ($model->load(Yii::$app->request->post()) && $model->save())
        {

            Yii::$app->session->setFlash('success', 'Вы успешно зарегестрировались');
            return $this->redirect('/login/login-up');
            
        }

        return $this->render('signup', ['model' => $model]);
    }    

    
}
