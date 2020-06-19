<?php 

namespace app\models\image;

use app\models\Image;
use yii\bootstrap\ActiveForm;
use yii\db\ActiveRecord;

class Photos extends ActiveRecord
{
    public static function getAllImage()
    {
        $photos = self::find()->all();
        return $photos;
    }

    public static function getOne($id)
    {
        $photo = self::find()
            ->where(['id' => $id])
            ->one();
        return $photo;
    }
}