<?php

namespace app\models\register;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $username
 * @property int $status
 * @property int $verified
 * @property int $resettable
 * @property int $roles_mask
 * @property int $registered
 * @property int $last_login
 * @property int $force_logout
 * @property string $image
 *
 * @property News[] $news
 * @property Photos[] $photos
 */
class register extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'registered', 'force_logout', 'image'], 'required'],
            [['status', 'verified', 'resettable', 'roles_mask', 'registered', 'last_login', 'force_logout'], 'default', 'value' => null],
            [['status', 'verified', 'resettable', 'roles_mask', 'registered', 'last_login', 'force_logout'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['email', 'password', 'image'], 'string', 'max' => 255],
            [['username'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'username' => 'Username',
            'status' => 'Status',   
            'verified' => 'Verified',
            'resettable' => 'Resettable',
            'roles_mask' => 'Roles Mask',
            'registered' => 'Registered',
            'last_login' => 'Last Login',

            'image' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    // public function getNews()
    // {
    //     return $this->hasMany(News::className(), ['user_id' => 'id']);
    // }

    // /**
    //  * @return \yii\db\ActiveQuery
    //  */
    // public function getPhotos()
    // {
    //     return $this->hasMany(Photos::className(), ['user_id' => 'id']);
    // }
}
