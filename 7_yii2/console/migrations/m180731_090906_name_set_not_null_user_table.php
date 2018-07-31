<?php

use yii\db\Migration;

/**
 * Class m180731_090906_name_set_not_null_user_table
 */
class m180731_090906_name_set_not_null_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->alterColumn('user', 'first_name', 'SET NOT NULL');
	    $this->alterColumn('user', 'last_name', 'SET NOT NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->alterColumn('user', 'first_name', 'DROP NOT NULL');
	    $this->alterColumn('user', 'last_name', 'DROP NOT NULL');
	    $this->alterColumn('user', 'first_name', 'SET DEFAULT NULL');
	    $this->alterColumn('user', 'last_name', 'SET DEFAULT NULL');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180731_090906_name_set_not_null_user_table cannot be reverted.\n";

        return false;
    }
    */
}
