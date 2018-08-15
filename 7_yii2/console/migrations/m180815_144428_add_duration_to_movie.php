<?php

use yii\db\Migration;

/**
 * Class m180815_144428_add_duration_to_movie
 */
class m180815_144428_add_duration_to_movie extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    	$this->addColumn('movie', 'duration', $this->integer()->notNull()->defaultValue(120));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('movie', 'duration');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180815_144428_add_duration_to_movie cannot be reverted.\n";

        return false;
    }
    */
}
