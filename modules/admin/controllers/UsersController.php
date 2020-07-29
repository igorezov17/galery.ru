<?php

namespace app\modules\admin\controllers;

use Yii;
use yii\web\Controller;
use app\models\Users;

/**
 * Default controller for the `admin` module
 */
class UsersController extends Controller
{


    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $users = Users::getAll();
        
        //echo "Welcome In first in Admin";
        return $this->render('index', ['users' => $users]);
    }

    public function actionEdit()
    {
        $model = new Users();
        if (Yii::$app->request->post())
        // {
        //     var_dump(Yii::$app->request->post());
        //     die;
        // }

        //if ($model->load(Yii::$app->request->post()));

        return $this->render('edit', ['model' => $model]);
    }

    
}
