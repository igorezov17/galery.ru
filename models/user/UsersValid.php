<?php 

namespace app\models\user;

use Yii;
use yii\base\Model;

class UsersValid extends Model
{
    public $username;
    public $email;
    public $image;
    public $password;

    public function rules()
    {
        return [
            [['username'], 'trim'],
            [['email'], 'email']
        ];
    }


    /**
     * Undocumented function
     *
     * @param [type] $id
     * @return void
     * changed user's: username, email, image
     */
    public function saveUser($id)
    {
        if ($this->validate())
        {
            $sql = "UPDATE users SET username = :username, email = :email, image = :image WHERE id = :id";
            return Yii::$app->db->createCommand($sql)
                                ->bindValue(':username', $this->username)
                                ->bindValue(':email', $this->email)
                                ->bindValue(':image', $this->image)
                                ->bindValue(':id', $id)
                            ->execute();
        } else {
            echo "fuck user";    
        }

    }

    /**
     * 
     * changed user's: password
     */
    public function savePass()
    {
        $sql = "UPDATE users SET password = :password";
        return Yii::$app->db->createCommand()
                    ->bindValue(':password', $this->password)
                    ->execute();
    }
}