<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "media1".
 *
 * @property int $id
 * @property string $filename
 * @property string $filepath
 * @property string $extension
 */
class Media1 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'media1';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filename'],'file', 'maxFiles'=> 10],
            [['filepath'], 'string'],
            [['extension'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'filename' => 'Filename',
        ];
    }
}
