<?php

use yii\db\Migration;

/**
 * Handles the creation of table `places_to_reservations`.
 */
class m180822_150537_create_places_to_reservations_table extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('place_to_reservation', [
			'place_id' => $this->integer()->notNull(),
			'reservation_id' => $this->integer()->notNull()
		]);

		$this->addPrimaryKey(
			'place_to_reservation_pk',
			'place_to_reservation',
			['place_id', 'reservation_id']
		);

		$this->addForeignKey(
			'place_id_to_place_fk',
			'place_to_reservation', 'place_id',
			'place', 'id',
			'CASCADE'
		);

		$this->addForeignKey(
			'reservation_id_to_reservation_fk',
			'place_to_reservation', 'reservation_id',
			'reservation', 'id',
			'CASCADE'
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('place_to_reservation');
	}
}
