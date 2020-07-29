<?php 

namespace app\models;

use yii\db\ActiveRecord;

class Image extends ActiveRecord
{

    public static function tableName()
    {
        return "{{photos}}";
    }

    public static function getAll()
    {
        $data = self::find()->limit(6)->all();

        return $data;
    }
}