<?php

namespace app\models\admin\images;

use Yii;
use yii\base\Model;
use app\models\admin\images\Photo;
use app\components\behaviors\MyBehavior;
use app\models\admin\ModelAdminInterface;

class ImageFrm extends Model implements ModelAdminInterface
{

    public $title;
    public $description;
    public $image;

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

    public function editObt($file)
    {
        $file = $file[0];
        $id = Yii::$app->user->id;
        if ($this->validate())
        {
            $sql = "INSERT INTO photos(title, description, image, date, user_id) VALUES (:title, :description, :image, :date, :user_id)";
            Yii::$app->db->createCommand($sql)
                                ->bindValue(':title', $this->title)
                                ->bindValue(':description', $this->description)
                                ->bindValue(':image', $this->image)
                                ->bindValue(':date', date('Y-m-d\TH:i:s'))
                                ->bindValue(':user_id', $id)
                                ->execute();
            $file->saveAS(Yii::getAlias('@web') . 'uploads/' . $file->name);
            return true;
        } else
        {
            return false;
        }
    }

        /**
     * Обновить изображение
     */
    public function updateObt($id, $file)
    {
        $file = $file[0];

        if ($this->validate())
        {
            $sql = "UPDATE photos SET title = :title, description = :description, image = :image WHERE id = :id";
            Yii::$app->db->createCommand($sql)
                            ->bindValue(':title', $this->title)
                            ->bindValue(':description', $this->description)
                            ->bindValue(':image', $this->image)
                            ->bindParam(':id', $id)
                            ->execute();
            $file->saveAS(Yii::getAlias('@web') . 'uploads/' . $file->name);
            return true;
        } 
        else
        {
            return false;
        }
    }
    /**
     * Undocumented function
     *
     * удаление картинки в панели администратора
     * @param [type] $id
     */
    public static function deleteObt($id)
    {
        $sql = "DELETE FROM photos WHERE id = :id";
        return Yii::$app->db->createCommand($sql)
                    ->bindValue(':id', $id)
                    ->execute();
    }
}