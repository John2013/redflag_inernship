<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reservation_statuses`.
 */
class m180801_093305_create_reservation_statuses_table extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('reservation_statuses', [
			'id' => $this->primaryKey(),
			'name' => $this->string()->notNull()
		]);

		$this->createIndex('statuses_name_uindex', 'reservation_statuses', ['name']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('reservation_statuses');
	}
}
