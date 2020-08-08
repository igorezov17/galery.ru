<?php 

namespace app\models\admin\posts;

use Yii;
use yii\base\Model;
use app\models\admin\ModelAdminInterface;

class PostValid extends Model implements ModelAdminInterface
{
    public $title;
    public $description;
    public $image;

    public function rules()
    {
        return [
            [['title', 'description', 'image'], 'required'],
            [['title'], 'string', 'min' => 2],
            [['description'], 'string', 'min' => 2],
            [['image'], 'trim'],
        ];
    }

    public function editObt()
    {
        if ($this->validate())
        {

            $sql = "INSERT INTO news(title, description, image) VALUES (:title, :description, :image)";
            return Yii::$app->db->createCommand($sql)
                                ->bindValue(':title', $this->title)
                                ->bindValue(':description', $this->description)
                                ->bindValue(':image', $this->image)
                                ->execute();
        } else
        {
            return false;
        }
    }

    public function updateObt($id)
    {
        if ($this->validate())
        {
            $sql = "UPDATE news SET title = :title, description = :description, image = :image WHERE id = :id";
            return Yii::$app->db->createCommand($sql)
                            ->bindValue(':title', $this->title)
                            ->bindValue(':description', $this->description)
                            ->bindValue(':image', $this->image)
                            ->bindParam(':id', $id)
                            ->execute();
        } 
        else
        {
            return false;
        }

    }

    public static function deleteObt($id)
    {
        $sql = "DELETE FROM news WHERE id = :id";
        return Yii::$app->db->createCommand($sql)
                    ->bindValue(':id', $id)
                    ->execute();

    }
}