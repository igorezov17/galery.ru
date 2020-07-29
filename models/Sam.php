<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Sam extends ActiveRecord
{
    public static function tableName()
    {
        return "{{users}}";
    }

    public static function getAll()
    {
        return Sam::find()
        ->all();
    }
}

?>