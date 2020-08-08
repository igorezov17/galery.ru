<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Users extends ActiveRecord
{

    public $username;
    public $email;
    public $password;
    public $image;

    public static function tableName()
    {
        return '{{users}}';
    } 

    public static function getAll()
    {
        // $data = self::find()->all();
        $sql = "SELECT * FROM users";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }

    public function getUser($id)
    {
        $sql = "SELECT password FROM users WHERE id=:id";
        return Yii::$app->db->createCommand($sql)
                        ->bindValue('id', $id)
                        ->queryOne();
    }
}