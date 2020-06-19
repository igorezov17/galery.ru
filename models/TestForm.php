<?php
namespace app\models;

use Yii;
use yii\base\Model;
use yii\bootstrap\Modal;

class TestForm extends Model
{
    public $name;
    public $password;
    public $email;
    public $text;

        public function attributeLabels()
    {
        return(['$name'=>'$Имя',
                //'$password'=>'$Пароль',
                '$email'=>'$Email',
                '$text'=>'$Текст']);
    }

    public function rules()
    {
        return ([ 
            [['name', 'email', ], 'required', 'message' => 'Поле обязательно'],
            //['password', 'validatePassword'],
            ['email', 'email'],
            //['password', 'password']
            ['name','string','min'=>2],
    ]);
    }
}


?>