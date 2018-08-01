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
        $this->createTable('halls', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('halls');
    }
}
