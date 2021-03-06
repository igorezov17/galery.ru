<?php 

namespace app\models\image;

use Yii;
use yii\base\Model;

class ImageValid extends Model
{
    public $title;
    public $description;
    public $image;
    


    public function rules()
    {
        return [
            [['title', 'description', 'image'], 'required'],
            [['title', 'description', 'image'], 'trim'],
        ];
    }

    /**
     * Undocumented function
     * Создание нового изображения
     * @param [type] $id
     * @param [type] $category
     * @return void
     */
    public function saveimage($id, $category, $file)
    {
        $file = $file['0'];

        if ($this->validate())
        {
            $sql = "INSERT INTO 
                            photos(title, description, image, date, user_id, category_id) 
                    VALUES (:title, :description, :image, :date, :user_id, :category_id)";
            Yii::$app->db->createCommand($sql)
                    ->bindValue(':title', $this->title)
                    ->bindValue(':description', $this->description)
                    ->bindValue(':image', $this->image)
                    ->bindValue(':date', date('Y-m-d\TH:i:s'))
                    ->bindValue(':user_id', $id)
                    ->bindValue(':category_id', $category)
                    ->execute();
            $file->saveAS(Yii::getAlias('@web') . 'uploads/' . $file->name);
            return true;
                
        } else {
            echo "fuck image";    
        }
    }

    /**
     * Undocumented function
     * Получение категории
     * @return void
     */
    public function getCategory()
    {
        $sql = "SELECT * FROM category";
        return Yii::$app->db->createCommand($sql)->queryAll();
    }
    
}