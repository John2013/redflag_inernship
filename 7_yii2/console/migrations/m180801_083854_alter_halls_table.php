<?php

use yii\db\Migration;

/**
 * Class m180801_083854_alter_halls_table
 */
class m180801_083854_alter_halls_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    	$this->createIndex('halls_number_uindex', 'hall', ['number'], true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('halls_number_uindex', 'hall');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180801_083854_alter_halls_table cannot be reverted.\n";

        return false;
    }
    */
}
