<?php 

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\User;
use app\models\register\User1;

class Loginup extends Model
{
    public $username;
    public $lastname;
    public $email;
    public $password;

    public function rules()
    {
        return [

            [['username', 'email', 'password'], 'required'],
            [['username'], 'string', 'min'=>2, 'max'=>250],
            [['email'], 'string', 'max'=>250],
            [['email'], 'email'],
            // [['username'], 'unique', 'targetClass'=>User::className()],
            // [['email'], 'unique', 'targetClass'=>User::className()],
            [['password'], 'string', 'min'=>2],
            [['password'], 'validatePassword'],

        ];
    }

    public function login()
    {
        $user = new User1;

        if ($this->validate())
        {
            $user = User1::getUser($this->email);
            return Yii::$app->user->login($user);
        }
    }

    public function validatePassword($attributes, $params)
    {
        $user = User1::getUser($this->email);
        if ($user && !$user->validatePassword($this->password))
        {
            $this->addError($attributes, 'Неверный логин или пароль');
        }
    }
}