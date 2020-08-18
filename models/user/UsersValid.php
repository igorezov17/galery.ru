<?php 

namespace app\models\user;

use Yii;
use yii\base\Model;
use app\models\login\Users;

class UsersValid extends Model
{
    public $username;
    public $image;


    public function rules()
    {
        return [
            [['username'], 'trim'],
        ];
    }

    /**
     * Undocumented function
     *
     * @param [type] $id
     * changed user's: username, email, image
     */
    public function saveUser($id, $file)
    {
        $file = $file[0];
        if ($this->validate())
        {
            $sql = "UPDATE users SET username = :username, image = :image WHERE id = :id";
            Yii::$app->db->createCommand($sql)
                                ->bindValue(':username', $this->username)
                                ->bindValue(':image', $this->image)
                                ->bindValue(':id', $id)
                                ->execute();

            $file->saveAS(Yii::getAlias('@web') . 'uploads/' . $file->name);
            return true;
        } else {
            return false; 
        }
    }

}