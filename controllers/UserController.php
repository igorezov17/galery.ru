<?php 

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\user\UsersValid;
use app\models\user\PassValid;
use yii\web\UploadedFile;
use app\models\Users;
use yii\filters\AccessControl;

class UserController extends Controller
{

    /**
     * Основная информация о пользователе
     */
    public function actionProfile()
    {
        $id = Yii::$app->user->id;
        $users = new Users();
        $users = $users->getUser($id);
        return $this->render('profile', ['users' => $users]);
    }

    /**
     * Возможность пользователя менять свое имя и аватарку
     */
    public function actionInfo()
    {
        $model = new UsersValid();
        $image = UploadedFile::getInstances($model, 'image');
        if (Yii::$app->request->isPost)
        {
            if ($model->load(Yii::$app->request->post()) && $model->image = $image[0]->name)
            {
                if ($model->saveUser(Yii::$app->user->id, $image))
                {
                    Yii::$app->session->setFlash('success', 'Вы успешно изменили свои данные');
                    return $this->redirect('/user/info');
                } 
                else
                {
                    Yii::$app->session->setFlash('warning', 'Упс, что-то пошла не так');
                    return $this->redirect('/user/info');
                }
            }
        }
        return $this->render('info', ['model' => $model]);
    }

    /**
     * Возможность пользователя менять свой пароль
     */
    public function actionSecurity()
    {
        $model = new PassValid();
        $data = Yii::$app->request->post();
        $id = Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post()))
        {
            if ($model->updatePass($id))
            {
                Yii::$app->session->setFlash('success', 'Вы успешно изменили свои данные');
                return $this->redirect('/user/security');
            } 
            else
            {
                Yii::$app->session->setFlash('warning', 'Упс, что-то пошла не так');
                return $this->redirect('/user/security');
            }
            die; 
        }
        return $this->render('security', ['model' => $model]);
    }


    /**
     * Выход из учетной записи
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Undocumented function
     * @return void
     * getRole and die
     * Установка ролей
     */
    public function actionRole()
    {
        // $admin = Yii::$app->authManager->createRole('admin');
        // $admin->description = 'Administration';
        // Yii::$app->authManager->add($admin);

        // $user = Yii::$app->authManager->createRole('user');
        // $user->description = 'User';
        // Yii::$app->authManager->add($user);

        // // contentManager
        // $content = Yii::$app->authManager->createRole('content');
        // $content->description = 'Content Manager';
        // Yii::$app->authManager->add($content);

        // $ban = Yii::$app->authManager->createRole('banned');
        // $ban->description = 'Banned';
        // Yii::$app->authManager->add($ban);

        // return True;
        // $canAdmin = Yii::$app->authManager->createPermission('canAdmin');
        // $canAdmin->description = 'Is admin';
        // Yii::$app->authManager->add($canAdmin);
        
        // var_dump(Yii::$app->user->getId());
        // die;
        /////////////////////////////

        // $userRole = Yii::$app->authManager->getRole('user');
        // Yii::$app->authManager->assign($userRole, Yii::$app->user->getId());

        // return True;

        //return $this->redirect('/');
    }
}