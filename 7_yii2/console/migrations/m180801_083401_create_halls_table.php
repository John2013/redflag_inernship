<?php

use yii\db\Migration;

/**
 * Handles the creation of table `halls`.
 */
class m180801_083401_create_halls_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('hall', [
	        'id' => $this->primaryKey(),
	        'number' => $this->integer()->notNull(),
	        'created_at' => $this->integer(),
	        'updated_at' => $this->integer(),
        ]);
    }
}
