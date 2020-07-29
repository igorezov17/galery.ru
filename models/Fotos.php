<?php

namespace app\models;

use Yii;

use yii\db\ActiveRecord;


class Fotos extends ActiveRecord
{

    public static function tableName()
    {
        return '{{photos}}';
    }
    
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['image'], 'string', 'min' => 2],
            // [['date'], 'date', 'format' => "php:Y-m-d"]
        ];
    }

    public function getImage()
    {
        return ($this->image) ? $this->image : 'image not found';
    }

    public function getDate()
    {
        return ($this->date) ? Yii::$app->formatter->asDate($this->date) : "not time";
    }

    public function getUser()
    {
        return $this->hasOne(Users::className(),['id'=>'user_id'])->one();
    }

}