<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reservations`.
 */
class m180801_093611_create_reservations_table extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('reservations', [
			'id' => $this->primaryKey(),
			'user_id' => $this->integer()->notNull(),
			'place_id' => $this->integer()->notNull(),
			'status_id' => $this->integer()->notNull(),
			'session_id' => $this->integer()->notNull(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer(),
		]);

		$this->addForeignKey(
			'user_id_users_id_fk',
			'reservations', ['user_id'],
			'user', ['id'],
			'CASCADE'
		);
		$this->addForeignKey(
			'place_id_places_id_fk',
			'reservations', ['place_id'],
			'places', ['id'],
			'CASCADE'
		);
		$this->addForeignKey(
			'status_id_statuses_id_fk',
			'reservations', ['status_id'],
			'reservation_statuses', ['id'],
			'CASCADE'
		);
		$this->addForeignKey(
			'session_id_sessions_id_fk',
			'reservations', ['session_id'],
			'sessions', ['id'],
			'CASCADE'
		);

		$this->createIndex(
			'user_place_session_uindex',
			'reservations', ['user_id', 'place_id', 'session_id']
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('reservations');
	}
}
