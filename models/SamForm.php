<?php

namespace app\models;

use yii\base\Model;
use yii\bootstrap\Modal;

class SamForm extends Model
{
    public $name;
    public $password;
    public $email;
    public $text;

    public function attributeLabels()
    {
        return(['$name'=>'$Имя',
                '$password'=>'$Пароль',
                '$email'=>'$Email',
                'text'=>'$Текст сообщения']);
    }

    public function rules()
    {
        return ([
            [['name','password','email'], 'required', 'message'=>'Поле обязательно'],
            ['name', 'string','min'=>2,'message'=>'Минимум 2 символа'],
        ]);
    }


}