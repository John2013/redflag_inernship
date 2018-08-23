<?php

use yii\db\Migration;

/**
 * Class m180822_152324_drop_column_place_id_from_reservation
 */
class m180822_152324_drop_column_place_id_from_reservation extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->dropIndex('user_place_session_uindex', 'reservation');

		$this->dropColumn('reservation', 'place_id');

		$this->createIndex('user_session_uindex', 'reservation', ['user_id', 'session_id'], true);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{

		$this->dropIndex('user_session_uindex', 'reservation');

		$this->addColumn('reservation', 'place_id', $this->integer()->notNull());

		$this->createIndex(
			'user_place_session_uindex',
			'reservations', ['user_id', 'place_id', 'session_id'],
			true
		);

		$this->addForeignKey(
			'place_id_places_id_fk',
			'reservations', ['place_id'],
			'places', ['id'],
			'CASCADE'
		);
	}

	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m180822_152324_drop_column_place_id_from_reservation cannot be reverted.\n";

		return false;
	}
	*/
}
