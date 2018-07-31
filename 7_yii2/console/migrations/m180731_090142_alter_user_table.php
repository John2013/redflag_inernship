<?php

use yii\db\Migration;

/**
 * Class m180731_090142_alter_user_table
 */
class m180731_090142_alter_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up()
    {
	    $this->addColumn('user', 'first_name', $this->string());
	    $this->addColumn('user', 'last_name', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function down()
    {
	    $this->dropColumn('user', 'first_name');
	    $this->dropColumn('user', 'last_name');
    }
}
