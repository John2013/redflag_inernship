<?php

use yii\db\Migration;

/**
 * Class m180731_153546_alter_poster_url_field_movie_table
 */
class m180731_153546_alter_poster_url_field_movie_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    	$this->renameColumn('movies', 'poster_url', 'poster');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->renameColumn('movies', 'poster', 'poster_url');
    }
}
