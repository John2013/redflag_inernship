<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tariffs`.
 */
class m180801_091259_create_tariffs_table extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->createTable('tariffs', [
			'id' => $this->primaryKey(),
			'name' => $this->string()->notNull(),
			'price' => $this->decimal(8, 2)->notNull(),
			'created_at' => $this->integer(),
			'updated_at' => $this->integer()
		]);

		$this->createIndex('name_uindex', 'tariffs', ['name']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('tariffs');
	}
}
