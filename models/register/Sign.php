<?php 

namespace app\models\register;

use Yii;
use yii\base\Model;
use app\models\Users;
use app\models\register\User1;


class Sign extends Model
{

    public $email;
    public $password;

    public function rules()
    {
        return [
            [['email', 'password'], 'required'],
            ['email', 'email'],
            ['email', 'unique', 'targetClass'=>'app\models\register\User1'],
            ['password','string', 'min'=>2, 'max'=>10]
        ];
    }

    public function sign()
    {
        $user = new User1();

        $user->email = $this->email;
        $user->password = Yii::$app->security->generatePasswordHash($this->password);

        // $user->password = sha1($this->password);
        return $user->save(); //true or false
    }

    

}