<?php
// Create SamController

namespace app\controllers;

use Yii;
use yii\base\Controller;
use app\models\SamForm;
class SamController extends Controller
{
    public $layout = 'maybe';

    public function actionDexter()
    {
        $this->view->title = 'Статья';
        
        return $this->render('dexter');
    }

    public function actionSchool()
    {
        $this->view->title = 'Все статьи';
        $model = new SamForm();
        if (Yii::$app->request->isAjax) // проверка того, что ajax запрос пришел
        {
            //debug ($_GET);
            debug (Yii::$app->request->post());

            return "test";
        }
        $this->view->registerMetaTag(['name'=>'keywords','content'=>'ключевики']);
        $this->view->registerMetaTag(['name'=>'description','content'=>'описание страницы']);
        return $this->render('school', compact('model'));
    }
}