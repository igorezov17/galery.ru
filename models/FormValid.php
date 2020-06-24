<?php 

namespace app\models;

use yii\base\Model;

class FormValid extends Model
{
    public $email;
    public $name;
    public $password;

    public function rules()
    {
        return [
            [['email'], 'required'],
            [['email'], 'email'],
            [['name'], 'required']
        ];
    }

    public function save()
    {
        //$sql = "INSERT INTO users ()"
    }
}