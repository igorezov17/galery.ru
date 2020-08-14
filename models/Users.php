<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Users extends ActiveRecord
{

    public $username;
    public $email;
    public $password;
    public $image;

    public static function tableName()
    {
        return '{{users}}';
    } 

    public static function getAll()
    {
        // $data = self::find()->all();
        $sql = "SELECT * FROM users";
        $data = Yii::$app->db->createCommand($sql)->queryAll();
        return $data;
    }

    public function getPass($id)
    {
        $sql = "SELECT password FROM users WHERE id=:id";
        return Yii::$app->db->createCommand($sql)
                        ->bindValue('id', $id)
                        ->queryOne();
    }

    public function getUser($id)
    {
        $sql = "SELECT * FROM users WHERE id=:id";
        return Yii::$app->db->createCommand($sql)
                        ->bindValue('id', $id)
                        ->queryOne();
    }

    public static function changeRole($id, $role)
    {
        // var_dump($id);
        // echo "<br>";
        // var_dump($role);
        // die;

        $rol = ($role == true) ? 'banned' : 'user';
                $sql = "UPDATE auth_assignment SET item_name = :role WHERE user_id::integer = :id";
        return Yii::$app->db->createCommand($sql)
                     ->bindValue(':id', $id)
                     ->bindValue(':role', $rol)
                     ->execute();
    }

    public static function getUserRole()
    {
        $sql = "SELECT users.id as id, 
                    users.username as name, 
                    users.image as image, 
                    users.email as email, 
                    auth_assignment.item_name as role 
                FROM users 
                LEFT JOIN auth_assignment on users.id = auth_assignment.user_id::integer";
        return Yii::$app->db->createCommand($sql)
                        ->queryAll();
    }
}