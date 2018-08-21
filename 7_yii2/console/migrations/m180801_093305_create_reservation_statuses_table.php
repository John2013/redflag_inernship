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
			'name' => $this->string()->notNull()->unique(),
			'title' => $this->string()->notNull()->unique()
		]);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropTable('reservation_statuses');
	}
}
