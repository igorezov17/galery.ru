<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class News extends ActiveRecord
{

    const SCENARIO_ADMIN = 'posts_update';

    public static function tableName()
    {
        return "{{news}}";
    }


    public static function getAll()
    {
        $data = self::find()->all();
        return $data;
    }
}