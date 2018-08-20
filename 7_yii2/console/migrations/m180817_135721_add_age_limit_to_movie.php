<?php

use yii\db\Migration;

/**
 * Class m180817_135721_add_age_limit_to_movie
 */
class m180817_135721_add_age_limit_to_movie extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->addColumn(
			'movie',
			'age_limit',
			$this
				->integer()
				->unsigned()
				->notNull()
				->defaultValue(18)
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropColumn('movie', 'age_limit');
	}

	/*
	// Use up()/down() to run migration code without a transaction.
	public function up()
	{

	}

	public function down()
	{
		echo "m180817_135721_add_age_limit_to_movie cannot be reverted.\n";

		return false;
	}
	*/
}
