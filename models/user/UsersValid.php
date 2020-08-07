<?php 

namespace app\models\user;

use Yii;
use yii\base\Model;
use app\models\login\Users;

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
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass' => Users::className(),],
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

}