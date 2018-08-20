<?php

use yii\db\Migration;

/**
 * Handles the dropping of table `movie_option`.
 */
class m180817_140049_drop_movie_option_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->dropTable('options_to_movies');
	    $this->dropTable('movie_option');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->createTable('movie_option', [
		    'id' => $this->primaryKey(),
		    'name' => $this->string()->unique()->notNull()
	    ]);

	    $this->createTable('options_to_movies', [
		    'movie_id' => $this->integer()->notNull(),
		    'option_id' => $this->integer()->notNull(),
	    ]);

	    $this->addPrimaryKey('options_to_movies_pk', 'options_to_movies', ['movie_id', 'option_id']);
	    $this->addForeignKey(
		    'options_to_movies_movies_fk',
		    'options_to_movies',
		    'movie_id',
		    'movie',
		    'id',
		    'CASCADE'
	    );
	    $this->addForeignKey(
		    'options_to_movies_options_fk',
		    'options_to_movies',
		    'option_id',
		    'movie_option',
		    'id',
		    'CASCADE'
	    );
    }
}
