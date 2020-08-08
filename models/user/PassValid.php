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
            // [['repeatPassword'], 'resetPassword'],
        ];
    }

    /**
     * Undocumented function
     *
     * @param [type] $attributes
     * @param [type] $params
     * @return void
     * 
     * Валидотор для проверки нового пароля и повторно введенного
     */
    public function resetPassword($attributes, $params)
    {
        if ($this->oldpassword != $this->repeatPassword)
        {
            $this->addError($attributes, "Пароли не совпадают");
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     * 
     * Проверка валидации и сверка на совпадение введеного пароля в указанным в БД
     * Обновление пароля
     */
    public function updatePass($id)
    {
        $user = new Users();
        $user = $user->getUser($id);

        if ($this->validate() && Yii::$app->security->validatePassword($this->oldpassword, $user['password']))
        {
            $password = Yii::$app->security->generatePasswordHash($this->newpassword);
            return $this->savePass($id, $password);
        } 
        else 
        {
           return false;
        }
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * @param [type] $pass
     * @return void
     * 
     * Запрос на обновление данных
     */
    private function savePass($id, $pass)
    {
        $sql = "UPDATE users SET password = :password WHERE id = :id";
        return Yii::$app->db->createCommand($sql)
                    ->bindValue(':id', $id)
                    ->bindValue(':password', $pass)
                    ->execute();
    }
}
