<?php

use yii\db\Migration;

/**
 * Class m180802_092220_alter_tariffs
 */
class m180802_092220_alter_tariffs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
	    $this->addColumn('tariffs', 'name', $this->string()->notNull());
	    $this->addColumn('tariffs', 'price', $this->decimal(8, 2)->notNull());
	    $this->addColumn('tariffs', 'created_at', $this->integer());
	    $this->addColumn('tariffs', 'updated_at', $this->integer());


	    $this->createIndex('name_uindex', 'tariffs', ['name']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180802_092220_alter_tariffs cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180802_092220_alter_tariffs cannot be reverted.\n";

        return false;
    }
    */
}
