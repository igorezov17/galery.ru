<?php 

namespace app\models\login;

use yii\base\Model;
use app\models\Users;

class Login extends Model
{
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['password', 'validatePassword'] // собственная функция для валидации
        ];
    }
 
    public function validatePassword($attributes, $params)
    {
        if (!$this->hasErrors())
        {
            $user = $this->getUser();
            if (!$user && ($user->validatePassword($this->password)))
            {
                $this->addError($attributes, "Email или пароль неверны");
            }
        }
        

    }

    public function getOne()
    {


        return Users::findOne(['email'=>$this->email]); //поиск одного пользователя
    }

    public function getUser()
    {

        $usr = Users::findOne(['email' => $this->email]);
        var_dump($usr);
        die;
    }


    // public function 
}