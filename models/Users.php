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


    // public function rules()
    // {
    //     return [
    //         [['username', 'email', 'password', 'image'], 'required'],
    //         [['username'], 'string', 'min'=> 2],
    //         [['email'], 'email'],
    //         [['password'], 'string', 'min'=>2,],
    //         [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
            
    //     ];
    // }



}