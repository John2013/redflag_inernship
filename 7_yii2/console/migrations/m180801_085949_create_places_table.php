<?php

use yii\db\Migration;

/**
 * Handles the creation of table `places`.
 */
class m180801_085949_create_places_table extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('places', [
			'id' => $this->primaryKey(),
			'row_id' => $this->integer()->notNull(),
			'number' => $this->integer()->notNull(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer()
		]);

		$this->addForeignKey(
			'row_id_to_rows_id_fk',
			'places', ['row_id'],
			'rows', ['id'],
			'CASCADE');

		$this->createIndex('row_id_number_uindex', 'places', ['row_id', 'number']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('places');
	}
}
