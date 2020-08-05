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
    public $imageFiles;
    public $image;


    const SCENARIO_ADMIN_CREATE = "users_edit";
    const SCENARIO_REG = "users_reg";
    const SCENARIO_INFO_UPDATE = "user_info_update ";
    const SCENARIO_SECURITY_UPDATE = "user_security_update";

    public function scenarios()
    {
        return [
            self::SCENARIO_ADMIN_CREATE => ['username', 'email', 'password', 'imageFiles', 'image'],
            self::SCENARIO_REG => ['username', 'email', 'password', 'repeatPassword'],
            self::SCENARIO_INFO_UPDATE => ['username', 'email'],
            self::SCENARIO_SECURITY_UPDATE => ['password'],
        ];
    }

    public function rules()
    {
        return [
            [['username', 'email', 'password'], 'required'],
            [['repeatPassword'], 'required'],
            [['imageFiles'], 'required'],
            [['imageFiles'], 'trim'],
            [['image'], 'trim'],
            [['username'], 'trim'],
            [['username'], 'string', 'min' =>2,'max'=>255],
            [['email'], 'email'],
            [['password'], 'string', 'min'=>4],
            [['repeatPassword'], 'resetPassword'], // собственный валидатор для проверки сходства двуз паролей
            [['email'], 'unique', 'targetClass' => Users::className(),],
            //[['imageFiles'], 'file', 'extensions' => 'png, jpg, jpeg']

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
        // var_dump($this->imageFiles);
        // die;
        if ($this->validate())
        {
            $user = new Users();
            $user->username = $this->username;
            $user->email = $this->email;
            $user->password = Yii::$app->security->generatePasswordHash($this->password);
            if (!$this->imageFiles)
            {
                $this->imageFiles = $this->emptyImage();    
                $user->image = $this->imageFiles['title'];
            }
            // var_dump($user->username);
            // echo "<br>";
            // var_dump($user->email);
            // echo "<br>";
            // var_dump($user->password);
            // echo "<br>";
            // var_dump($user->image);
            // echo "<br>";
            // var_dump($user);
            //die;
            $sql = "INSERT INTO users(username, email, password, image) VALUES (:username, :email, :password, :imageFile)";
            $rez = Yii::$app->db->createCommand($sql)
                ->bindValue(':username', $user->username)
                ->bindValue(':email', $user->email)
                ->bindValue(':password', $user->password)
                ->bindValue(':imageFile', $user->image)
                ->execute();
            return $rez;
            
            // return $user->save();

        } else {

            return !$this->hasErrors();
        }
    }
        
    public function emptyImage()
    {
        $sql = 'SELECT * FROM imageAdmin WHERE id = 1';
        return Yii::$app->db->createCommand($sql)->queryOne();
    }

    public static function delete($id)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        return Yii::$app->db->createCommand($sql)->bindValue(':id', $id)->execute();
    }


}