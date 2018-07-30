<?php

use yii\db\Migration;

/**
 * Handles the creation of table `movies`.
 */
class m180730_131135_create_movies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('movies', [
            'id' => $this->primaryKey(),
	        'title' => $this->string()->notNull(),
	        'description' => $this->text()->notNull(),
	        'poster_url' => $this->string()->notNull(),

	        'created_at' => $this->integer()->notNull(),
	        'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('movies');
    }
}
