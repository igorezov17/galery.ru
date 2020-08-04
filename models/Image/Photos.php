<?php 

namespace app\models\image;

use Yii;
use app\models\Image;
use yii\bootstrap\ActiveForm;
use yii\db\ActiveRecord;

class Photos extends ActiveRecord
{
    public static function getAllImage()
    {

        $sql = "SELECT
                    photos.id as id, 
                    photos.title as imagename, 
                    photos.image as img, 
                    photos.date as date, 
                    category.title as categname 
                FROM photos LEFT JOIN category on photos.category_id = category.id LIMIT 8";
           return Yii::$app->db->createCommand($sql)->queryAll();
        // $photos = self::find()->all();
        // return $photos;
    }

    public static function getOne($id)
    {
        $photo = self::find()
            ->where(['id' => $id])
            ->one();
        return $photo;
    }


    public function userImage($id)
    {

        $sql = "SELECT
                    photos.id as id, 
                    users.username as username, 
                    photos.image as imagename, 
                    photos.image as img, 
                    photos.date as date, 
                    category.title as categname 
                FROM photos 
                LEFT JOIN users on users.id = :id 
                LEFT JOIN category on category.id = photos.category_id LIMIT 4;";
        return Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();
    }
}