<?php

namespace app\models\admin\images;

use Yii;
use yii\base\Model;
use app\models\admin\images\Photo;
use app\components\behaviors\MyBehavior;


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

    public function rules()
    {
        return [
            [['title', 'description', 'image'], 'required'],
            [['title'], 'string', 'min' => 2],
            [['description'], 'string', 'min' => 2],
            [['image'], 'trim'],
        ];
    }

    public function editImage()
    {
        if ($this->validate())
        {
            $image = new Photo();
            
        }
    }

    /**
     * Undocumented function
     *
     * удаление картинки в панели администратора
     * @param [type] $id
     * @return void
     */
    public static function deleteImage($id)
    {
        $sql = "DELETE FROM photos WHERE id = :id";
        return Yii::$app->db->createCommand($sql)
                    ->bindValue(':id', $id)
                    ->execute();
    }



}