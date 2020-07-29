<?php 

namespace app\controllers;

use yii\base\Controller;
use Yii;
use app\models\Users;
use app\models\FormValid;
use app\models\Employs;



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
        $formData = Yii::$app->request->post();

        if (Yii::$app->request->isPost)
        {
            echo "<pre>";
            print_r($formData);
            echo "</pre>";
         
        }

        
        return $this->render('formtest');
        
    }


    public function debug($obt)
    {
        echo "<pre>";
        print_r($obt);
        echo "</pre>";
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

    public function actionHtmlHelp()
    {
        return $this->render('helps');
    }

    public function actionOutPut()
    {

        $comments = [
            [
                'id' => 1,
                'author' => 'Mikki',
                'text' => 'Hello' 
            ],
            [
                'id' => 2,
                'author' => 'Rutta',
                'text' => 'Hello, how you?' 
            ],
            [
                'id' => 2,
                'author' => 'Rutta',
                'text' => '<b>Hello</b><script>alert("I will steal you money")</script>' 
            ]
            ];
        return $this->render('out', ['comments' => $comments]);
    }

    public function actionTakeAll()
    {

        // $employs = Employs::find();
        // return $this->render('takeall', ['employs' => $employs]);

        $c = 0;
        $array = [];
        for ($a = 1; $a<rand(5,15); $a++)
        {
            $array[rand(1,90)]=rand(5,100);
            $c++;
        }
        $arr = array_unique($array);
        $this->debug($array);
        echo $c;

        die;
    }
}