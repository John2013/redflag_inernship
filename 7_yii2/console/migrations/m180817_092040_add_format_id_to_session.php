<?php

use yii\db\Migration;

/**
 * Class m180817_092040_add_format_id_to_session
 */
class m180817_092040_add_format_id_to_session extends Migration
{
	/**
	 * {@inheritdoc}
	 */
	public function safeUp()
	{
		$this->addColumn('session', 'format_id', $this->integer()->notNull()->defaultValue(1));

		$this->addForeignKey(
			'session_format_id_to_format_id_fk',
			'session', 'format_id',
			'format', 'id'
		);
	}

	/**
	 * {@inheritdoc}
	 */
	public function safeDown()
	{
		$this->dropColumn('session', 'format_id');
	}
}
