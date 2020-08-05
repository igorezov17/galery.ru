<?php 

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\user\UsersValid;
use yii\web\UploadedFile;
use app\models\Users;
use app\controllers\behaviors\AccessBehavior;


class UserController extends Controller
{
    // public function checkAccess()
    // {
    //     return [
    //         'access' => [
    //             'class' => AccessBehavior::className(),
    //             'rules' => [
    //                 'actions' => ['security', ],
    //                 'allow' => true,
    //                 'roles' => '*',
    //             ],
    //         ],
    //     ];
    // }

    public function actionInfo()
    {
        $model = new UsersValid();
        $image = UploadedFile::getInstances($model, 'image');
        if ($model->load(Yii::$app->request->post()) && $model->image = $image[0]->name)
        {
            if ($model->saveUser(Yii::$app->user->id))
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

        return $this->render('info', ['model' => $model]);
    }

    public function actionSecurity()
    {

        return $this->render('security');
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Undocumented function
     *
     * @return void
     * getRole and die
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

        $userRole = Yii::$app->authManager->getRole('content');
        Yii::$app->authManager->assign($userRole, Yii::$app->user->getId());

        return True;

        //return $this->redirect('/');
    }

}