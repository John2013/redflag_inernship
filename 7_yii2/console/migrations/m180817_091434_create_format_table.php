<?php

use yii\db\Migration;

/**
 * Handles the creation of table `format`.
 */
class m180817_091434_create_format_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('format', [
            'id' => $this->primaryKey(),
	        'name' => $this->string()->notNull()->unique(),
	        'created_at' => $this->integer(),
	        'updated_at' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('format');
    }
}
