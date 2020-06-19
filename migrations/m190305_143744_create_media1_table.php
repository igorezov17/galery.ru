<?php

use yii\db\Migration;

/**
 * Handles the creation of table `media1`.
 */
class m190305_143744_create_media1_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('media1', [
            'id' => $this->primaryKey(),
            'filename' => $this->text.filepath.text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('media1');
    }
}
