<?php 

namespace app\models\admin\users;

use Yii;
use app\models\login\Users;
use yii\base\Model;

class UserValid extends Model
{
    public $username;
    public $email;
    public $password;
    public $image;

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['username'], 'string', 'min' =>2,'max'=>255],
            //[['image'], 'trim'],
            [['email'], 'email'],
            [['password'], 'string', 'min'=>4],
            [['email'], 'unique', 'targetClass' => Users::className(),],
        ];
    }

    /**
     * Добавление нового поста
     */
    public function editObt($file)
    {
        $file = $file[0];
        if ($this->validate())
        {

            $sql = "INSERT INTO news(title, description, image) VALUES (:title, :description, :image)";
            Yii::$app->db->createCommand($sql)
                                ->bindValue(':title', $this->title)
                                ->bindValue(':description', $this->description)
                                ->bindValue(':image', $this->image)
                                ->execute();
            $file->saveAS(Yii::getAlias('@web') . 'uploads/' . $file->name);
            return true;
        } else
        {
            return false;
        }
    }

    /**
     * Обновить пост
     */
    public function save($file)
    {
	$fileName = "";
        if (isset($file['0'])) {
    	    $file = $file['0'];
    	    $file->saveAs(Yii::getAlias('@web') . 'uploads/' . $file->name);
    	    $fileName = $file->name;
        } else {
    	    $fileName = $this->emptyImage()['title'];
        }
        
        if ($this->validate())
        {
            $user = new Users();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password = Yii::$app->security->generatePasswordHash($this->password);
            $sql = "INSERT INTO users(username, email, password, image) VALUES (:username, :email, :password, :imageFile)";
            Yii::$app->db->createCommand($sql)
                ->bindValue(':username', $user->username)
                ->bindValue(':email', $user->email)
                ->bindValue(':password', $user->password)
                ->bindValue(':imageFile', $fileName)
                ->execute();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Undocumented function
     * Если картинка пустая, то установить картинку заглушку
     * @return void
     */
    public function emptyImage()
    {
        $sql = 'SELECT * FROM imageAdmin WHERE id = 1';
        return Yii::$app->db->createCommand($sql)->queryOne();
    }

    /**
     * Undocumented function
     * Удаление пользователя
     * @param [type] $id
     * @return void
     */
    public static function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        return Yii::$app->db->createCommand($sql)->bindValue(':id', $id)->execute();
    }
}