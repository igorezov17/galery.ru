<?php 

namespace app\models;

use yii\base\Model;
use Yii;

class Subscribe extends Model
{
    public $email;
    public $password;

    public function rules() // правила валидации
    {
        return [
            [['email', 'password'], 'required'],
            [['email'], 'email'],
            [['password'], 'string', 'min'=>2, 'max'=>10]
        ];
    }

    public function save() // сохранение с использованием рукописного sql
    {
        $sql = "INSERT INTO user1(email, password) VALUES ('{$this->email}', '{$this->password}')";
        return Yii::$app->db->createCommand($sql)->execute();
    }
}