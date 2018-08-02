<?php

use yii\db\Migration;

/**
 * Handles the creation of table `sessions`.
 */
class m180801_092057_create_sessions_table extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('sessions', [
			'id' => $this->primaryKey(),
			'movie_id' => $this->integer()->notNull(),
			'hall_id' => $this->integer()->notNull(),
			'tariff_id' => $this->integer()->notNull(),
			'time' => $this->integer()->notNull(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		]);

		$this->addForeignKey(
			'movie_id_movies_id_fk',
			'sessions', ['movie_id'],
			'movies', ['id'],
			'CASCADE'
		);

		$this->addForeignKey(
			'hall_id_halls_id_fk',
			'sessions', ['hall_id'],
			'halls', ['id'],
			'CASCADE'
		);

		$this->addForeignKey(
			'tariff_id_tariffs_id_fk',
			'sessions', ['tariff_id'],
			'tariffs', ['id'],
			'CASCADE'
		);

		$this->createIndex('movie_id_time_uindex', 'sessions', ['movie_id', 'time']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('sessions');
	}
}
