<?php

use yii\db\Migration;

/**
 * Class m180816_142543_movie_add_trailer_column
 */
class m180816_142543_movie_add_trailer_column extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    	$this->addColumn('movie', 'trailer', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('movie', 'trailer');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180816_142543_movie_add_trailer_column cannot be reverted.\n";

        return false;
    }
    */
}
