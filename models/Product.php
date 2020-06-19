<?php
//create my table Product

namespace app\models;

use yii\db\ActiveRecord;


class Product extends ActiveRecord
{
    public static function tableName()
    {
        return "products"; //возвращаем имя таблицы к которой привязываем нашу модель
    }

    public function getCategories()
    {
        return $this->hasOne(Category::className(), ['id' => 'parent']);
    }

    //теперь необходимо связать две таблице
}