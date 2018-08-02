<?php

use yii\db\Migration;

/**
 * Class m180802_154133_sessions_time_to_timestamp
 */
class m180802_154133_sessions_time_to_timestamp extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    	$this->dropColumn('sessions', 'time');
    	$this->addColumn('sessions', 'time', $this->timestamp()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->dropColumn('sessions', 'time');
	    $this->alterColumn('sessions', 'time', $this->integer());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180802_154133_sessions_time_to_timestamp cannot be reverted.\n";

        return false;
    }
    */
}
