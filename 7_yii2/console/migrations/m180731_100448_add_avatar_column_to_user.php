<?php

use yii\db\Migration;

/**
 * Class m180731_100448_add_avatar_column_to_user
 */
class m180731_100448_add_avatar_column_to_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
    	$this->addColumn('user', 'avatar', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    	$this->dropColumn('user', 'avatar');
    }
}
