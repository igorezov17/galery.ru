<?php 

namespace app\models;

use Yii;
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

    /**
     * Undocumented function
     * Галерея текущего пользователя
     * @param [type] $id
     * @return void
     */
    public function getImageUser($id)
    {
        $sql = "SELECT * FROM photos WHERE user_id = :id";
        return Yii::$app->db->createCommand($sql)
                                ->bindValue(':id', $id)
                                ->queryAll();;
    }
    
    public function attributeLabels()
    {
        return [
            'filename' => 'Filename',
        ];
    }
}