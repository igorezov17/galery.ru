<?php

namespace app\models\admin\images;

use Yii;
use yii\db\ActiveRecord;

class Photo extends ActiveRecord
{
    public static function tableName()
    {
        return "{{photos}}";
    }
}