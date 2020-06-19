<?php

namespace app\models;

use yii\db\ActiveRecord;

class Users extends ActiveRecord
{
    /*public static function tableName()
    {
        return "Users";
    }*/

    public static function getAll()
    {
        $data = self::find()->all();

        return $data;
    }
}