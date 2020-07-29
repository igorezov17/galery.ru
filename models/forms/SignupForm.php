<?php 

namespace app\models\forms;

use Yii;
use yii\base\Model;
use app\models\Users;

class SignupForm extends Model
{

    public $username;
    public $email;
    public $password;
    public $repeatPassword;


    public function rules()
    {
        return [
            [['username', 'email', 'password', 'repeatPassword'], 'required'],
            [['username'], 'trim'],
            [['username'], 'string', 'min' =>2,'max'=>255],
            [['email'], 'email'],
            [['password'], 'string', 'min'=>6],
            [['repeatPassword'], 'resetPassword'], // собственный валидатор для проверки сходства двуз паролей
            [['email'], 'unique', 'targetClass' => Users::className(),]

        ];
    }

    public function resetPassword($attributes, $params)
    {
        if ($this->password != $this->repeatPassword)
        {
            $this->addError($attributes, "Пароли не совпадают");
        }
    }

    public function save()
    {
        if ($this->validate())
        {
            $user = new Users();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password = Yii::$app->security->generatePasswordHash($this->password);

            return $user->save();

        } else {
            return false;
        }
    }
        



}