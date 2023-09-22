<?php

use yii\db\Migration;

/**
 * Class m230921_075342_alter_table_apples_add_column_name
 */
class m230921_075342_alter_table_apples_add_column_name extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            'apples',
            'name',
            $this->string()->notNull()->comment('Название')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(
            'apples',
            'name'
        );
    }
}
