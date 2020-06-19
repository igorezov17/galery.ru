<?php

namespace app\controllers; //используем класс контроллер, поэтому пространство имен соотвествующие

use yii\base\Controller;
use app\models\ProbaForm;
use app\models\Category;

class PostController extends Controller
{

    public $layout = 'basic'; //мы устанавливаем шаблон в нашем классе, для определенных страниц
    // в данном случае шаблон установлен для всего приложения

    public function actionIndex()
    {
       /* if (Yii::$app->request->Ajax)
        {
            debug(Yii::$app->request->post());
            return 'test';
        }*/

        //$post = ProbaForm::findOne(2); //данные 3-го поста
        //$post->email = '2@2.com'; //добавление email
        //$post->save();// сохранение изменений

        //debug ($post);
        //$post->delete();

        ProbaForm::deleteAll(['>','id', 3]); // аналогично DELETE FROM `posts` WHERE `id` > 3

        $model = new ProbaForm;
        /*$model->name="Гендальф";
        $model->email="grey@bay.com";
        $model->text= 'Теперь я белый, а не серый';
        $model->save();*/
        //if ($model->load(Yii::$app->request->post())) // автоматическая загрузка данных
        $this->view->title = 'Все статьи';
        /*if (Yii::$app->request->isAjax)
        {
            debug($_GET);
            return 'test';
        }*/
    return $this->render("index", compact('model') );
    }
    
    public function actionShow()
    {
        $this->view->title = 'Одна статья';
        $this->view->registerMetaTag(['name'=>'keywords', 'content'=>'ключевики...']);
        $this->view->registerMetaTag(['name'=>'description', 'content'=>'описание страницы']);

        //$cats = Category::find()->all();
        //$cats = Category::find()->orderBy(["id"=> SORT_DESC])->all();
        //$cats = Category::find()->asArray()->all();
        //$cats = Category::find()->asArray()->where("parent = 691")->all(); // передача параметра в формате строки
        //$cats = Category::find()->asArray()->where(["parent" => 691])->all();
        //$cats = Category::find()->asArray()->where(["like","title","pp"])->all();
        //$cats = Category::find()->asArray()->where(["<=","id", 695])->all();
        //$cats = Category::find()->asArray()->where(['parent' => 691])->limit(1)->all();
        //$cats = Category::find()->asArray()->where(['parent' => 691])->limit(1)->one();
        //$cats = Category::find()->asArray()->where('parent = 691')->count();
        //$cats = Category::findOne(['parent'=> 691]);
        //$cats = Category::findAll(['parent'=>691]);
        //$query = "SELECT * FROM categories WHERE title LIKE '%pp%'";
        //$cats = Category::findBySql($query)->all();
        //$query = "SELECT * FROM categories WHERE title LIKE :search";
        //$cats = Category::findBySql($query,[':search'=>'%pp%'])->all();

        //$cats = Category::findOne(694);
        $cats = Category::find()->with('products')->all();


        return $this->render("show", compact('cats'));
    }

    public function actionDella()
    {
        $this->view->title = 'Пользователь';
        return $this->render("della");
    }
}
