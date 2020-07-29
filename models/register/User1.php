<?php 


namespace app\models\register;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User1 extends ActiveRecord implements IdentityInterface
{

    public static function tableName()
    {
        return '{{user1}}';
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public function getId()
    {
        
        return $this->id;
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    public function getAuthKey()
    {

    }

    public function validateAuthKey($authKey)
    {

    }

    public static function getUser($email)
    {

        return  self::find()->where(['email'=>$email])->one();

    }


    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }
}