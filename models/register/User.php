<?php 

namespace app\models\register;

use Yii;
use yii\db\ActiveRecord;

class User extends ActiveRecord
{
    public static function tableName()
    {
        return "{{user1}}";
    }
}