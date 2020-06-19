<?php
namespace app\models;

//use Yii;
//use yii\base\Model;
use yii\db\ActiveRecord;



class ProbaForm extends ActiveRecord
{

    public static function tableName()
    {
        return 'posts';
    }

        public function attributeLabels()  // нужен для того, чтобы поля назывались так, как нам нужно
        {
            return (['name'=>'Имя',
                    'email'=>'E-mail',
                    'text'=>'Текст сообщения']);
        }

        public function rules()
        {
            return ([
                [['name', 'text', ], 'required', 'message' => 'Поле обязательно'],
                ['email', 'email'],
            ]);
        }
}
