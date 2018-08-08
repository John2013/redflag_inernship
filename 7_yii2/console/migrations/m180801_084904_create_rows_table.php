<?php

use yii\db\Migration;

/**
 * Handles the creation of table `rows`.
 */
class m180801_084904_create_rows_table extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('row', [
			'id' => $this->primaryKey(),
			'hall_id' => $this->integer()->notNull(),
			'number' => $this->integer()->notNull(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer()
		]);

		$this->addForeignKey(
			'hall_id_to_halls_id_fk',
			'row',
			['hall_id'],
			'halls',
			['id'],
			'CASCADE'
		);

		$this->createIndex('number_hall_id_ui', 'row', ['hall_id', 'number']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('row');
	}
}
