<?php

use yii\db\Migration;

/**
 * Class m230922_144508_rename_column_percent_eat
 */
class m230922_144508_rename_column_percent_eat extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //$this->renameColumn('apples', 'percent_eat', 'size_percent');
        $this->alterColumn('apples', 'size_percent', $this->decimal(10,2)->notNull()->defaultValue(1.00)->comment('Размер (%)'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230922_144508_rename_column_percent_eat cannot be reverted.\n";

        return false;
    }
}
