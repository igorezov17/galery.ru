<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\login\Valid;
//use app\models\Users;


class LoginController extends Controller
{

    public $layout = 'standart'; 

    public function actionLoginUp()
    {

        $model = new Valid();
        $post = Yii::$app->request->post();
           if( $model->load(Yii::$app->request->post()) && $model->login())
           {
                    return $this->redirect('/');
           } else {
            return $this->render('logform', ['model'=>$model]);
           }
    }

}