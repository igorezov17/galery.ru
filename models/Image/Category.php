<?php 

namespace app\models\image;

use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function getAllCategory()
    {
        $categories = self::find()->all();
        return $categories;
    }
} 