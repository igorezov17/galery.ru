<?php

namespace app\models;

use yii\db\ActiveRecord;

class Users extends ActiveRecord
{

    public static function tableName()
    {
        return '{{users}}';

    } 
    /*public static function tableName()
    {
        return "Users";
    }*/

    public static function getAll()
    {
        $data = self::find()->all();

        return $data;
    }


    public function rules()
    {
        return [
            [['username', 'email', 'image'], 'required'],
            [['email'], 'email'],
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            
        ];
    }



}