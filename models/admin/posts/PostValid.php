<?php 

namespace app\models\admin\posts;

use Yii;
use yii\base\Model;

class PostValid extends Model
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

    public static function deletePost($id)
    {
        $sql = "DELETE FROM photos WHERE id = :id";
        return Yii::$app->db->createCommand($sql)
                    ->bindValue(':id', $id)
                    ->execute();
    }
}