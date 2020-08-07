<?php

namespace app\models\login;

use Yii;
use yii\base\Model;
use app\models\login\Users;

class Valid extends Model
{
    public $username;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            [['email'], 'email'],
            [['password'], 'validatePassword'],
        ];
    }

    public function login()
    {
        $users = new Users();
        if ($this->validate())
        {
            $user_log = $users->getUser($this->email);
            return Yii::$app->user->login($user_log);
        } 
    }

    public function validatePassword($attributes = null, $params = null)
    {
        $user = Users::find()->where(['email' => $this->email])->one();
        if (!$user || !$user->validPass($this->email, $this->password))
        {
            $this->addError($attributes, 'Неправильный логин или пароль');
        }  
    }

    // public function login()
    // {
    //     if ($this->validate())
    //     {
    //         return Yii::$app->user->login;
    //     }
    // }
}