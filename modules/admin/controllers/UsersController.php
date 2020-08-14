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

    /**
     * Undocumented function
     * Допступ к данному разделу сайта имеет только пользователь с ролью "admin"
     * @return void
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'edit', 'delete', 'change-role'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ]
        ];
    }

    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $users = Users::getUserRole();
        return $this->render('index', ['users' => $users]);
    }

    public function actionChangeRole($id, $role)
    {
        $model = Users::changeRole($id, $role);
        return $this->redirect('/admin/users');
    }

    /**
     * Undocumented function
     * Создание нового пользователя
     * @return void
     */
    public function actionEdit()
    {
        $model = new SignupForm();
        $model->scenario = SignupForm::SCENARIO_ADMIN_CREATE;
        $date = Yii::$app->request->post();
        $image = UploadedFile::getInstances($model, 'imageFiles');
        $model->imageFiles = $image[0]->name;
        $model->image = $image[0]->name;

        if ($model->load(Yii::$app->request->post()) && $model->image = $image[0]->name && $model->imageFiles = $image[0]->name )
        {
            if($model->save())
            {
                Yii::$app->session->setFlash('success', 'Пользователь успешно обновлен');
                return $this->redirect('/admin/users/');
            } 
            else {
                Yii::$app->session->setFlash('warning', 'Упс, что-то пошло не так');
                return $this->redirect('/admin/users/');
            }
        }
        return $this->render('edit', ['model' => $model]);
    }

    /**
     * Undocumented function
     * Удаление пользлвателя
     * @param [type] $id
     * @return void
     */
    public function actionDelete($id)
    {
        $rezult = SignupForm::delete($id);
        return $this->redirect('/admin/users');
    }
    
}
