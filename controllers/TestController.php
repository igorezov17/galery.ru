<?php 

namespace app\controllers;

use yii\base\Controller;
use Yii;
use app\models\Users;


class TestController extends Controller
{
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
}