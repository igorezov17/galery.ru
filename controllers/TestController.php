<?php 

namespace app\controllers;

use yii\base\Controller;
use Yii;
use app\models\Users;
use app\models\FormValid;


class TestController extends Controller
{

    public $formValid;

    public function actionIndex()
    {
        return $this->render('test');
    }


    public function actionHello()
    {
        $var = "Успешно передана переменная";

        $array = Users::getAll();
        /*$arfromdb = [];
        for ($i=0;$i<count($array); $i++)
        {
            $arfromdb[] = $array[$i];
            //var_dump($arfromdb);
        }*/

        return $this->render('Hello', ['rezult' => $var, 'array' => $array]);
    }


    public function actionTest()
    {
        return $this->render("test");
    }

    public function actionFormTest()
    {
        $formValid = new FormValid();

        $formData = Yii::$app->request->post();
        if (Yii::$app->request->isPost)
        {
            $formValid->email = $formData['email'];
            $formValid->name = $formData['name'];

            if ($formValid->validate())
            {
                $formValid->save();
            }
        }
        
        return $this->render('formtest', ['formValid' => $formValid]);
    }

    public function actionFormUser()
    {
        //var_dump(Yii::$app->request->post());
        return $this->render('NewForm');
    }

    public function actionNewForm()
    {
        echo "that is cull";
        var_dump(Yii::$app->request->post());
    }
}