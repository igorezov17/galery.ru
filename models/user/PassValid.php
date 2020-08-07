<?php

namespace app\models\user;

use Yii;
use yii\base\Model;
use app\models\Users;

class PassValid extends Model
{
    public $oldpassword;
    public $newpassword;
    public $repeatPassword;


    public function rules()
    {
        return [
            [['oldpassword', 'newpassword', 'repeatPassword'], 'required'],
            [['newpassword', 'repeatPassword'], 'string', 'min' => 4],
            //[['repeatPassword'], 'resetPassword'],
        ];
    }

    public function resetPassword($attributes, $params)
    {
        if ($this->oldpassword != $this->repeatPassword)
        {
            $this->addError($attributes, "Пароли не совпадают");
        }
    }

    public function updatePass($id)
    {

        if ($this->validate())
        {
            $user = Users::find()->where(['id'=>$id])->one();
            var_dump($this->newpassword);
            echo "<br>";
            var_dump($user);
            die;

            //Yii::$app->security->validatePassword($this->newpassword, $user->password);
            // то что в таблице $user->password
        } else 
        {
            return false;
        }
    }

    public function savePass()
    {
        $sql = "UPDATE users SET password = :password";
        return Yii::$app->db->createCommand()
                    ->bindValue(':password', $this->password)
                    ->execute();
    }

}
