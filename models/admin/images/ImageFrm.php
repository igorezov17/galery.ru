<?php

namespace app\models\admin\images;

use app\components\behaviors\MyBehavior;
use yii\base\Model;

class ImageFrm extends Model
{

    public $title;
    public $description;
    public $image;
    //public $user_id;


    public function behaviors()
    {
        return [
            [
                'class' => MyBehavior::className(),
            ]
            ];
    }
    // public function rules()
    // {
    //     return [
    //         [['title', 'description', 'image'], 'required'],
    //         [['title', 'description'], 'string', 'trim'],
    //     ];
    // }


}