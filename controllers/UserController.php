<?php 

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\Users;
use app\controllers\behaviors\AccessBehavior;


class UserController extends Controller
{
    public function checkAccess()
    {
        return [
            'access' => [
                'class' => AccessBehavior::className(),
                'rules' => [
                    'actions' => ['security'],
                    'allow' => true,
                    'roles' => '*',
                ],
            ],
        ];
    }

    public function actionInfo()
    {
        return $this->render('info');
    }

    public function actionSecurity()
    {

        return $this->render('security');
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
        // $userRole = Yii::$app->authManager->getRole('admin');
        // Yii::$app->authManager->assign($userRole, Yii::$app->user->getId());

        return True;

        //return $this->redirect('/');
    }

}