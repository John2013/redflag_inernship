<?php

use yii\db\Migration;

/**
 * Class m180802_141534_places_add_offset_column
 */
class m180802_141534_places_add_offset_column extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->addColumn('places', 'offset', $this->float()->defaultValue(0));
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropColumn('places', 'offset');
    }

	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m180802_141534_places_add_offset_column cannot be reverted.\n";

		return false;
	}
	*/
}
