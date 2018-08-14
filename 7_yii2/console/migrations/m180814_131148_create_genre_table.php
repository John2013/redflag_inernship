<?php

use yii\db\Migration;

/**
 * Handles the creation of table `genre`.
 */
class m180814_131148_create_genre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('genre', [
	        'id' => $this->primaryKey(),
	        'name' => $this->string()->notNull()->unique(),
        ]);

        $this->createTable('genres_to_movies', [
	        'movie_id' => $this->integer()->notNull(),
	        'genre_id' => $this->integer()->notNull(),
        ]);

        $this->addPrimaryKey('genres_to_movies_pk', 'genres_to_movies', ['movie_id', 'genre_id']);
	    $this->addForeignKey(
		    'genres_to_movies_movies_fk',
		    'genres_to_movies',
		    'movie_id',
		    'movie',
		    'id',
		    'CASCADE'
	    );
	    $this->addForeignKey(
		    'genres_to_movies_genres_fk',
		    'genres_to_movies',
		    'genre_id',
		    'genre',
		    'id',
		    'CASCADE'
	    );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    $this->dropTable('genres_to_movies');
	    $this->dropTable('genre');
    }
}
