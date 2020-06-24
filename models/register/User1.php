<?php 


namespace app\models\register;

use yii\db\ActiveRecord;

class User1 extends ActiveRecord
{
    public function setPassword($password)
    {
        $this->password = sha1($password);
    }
}