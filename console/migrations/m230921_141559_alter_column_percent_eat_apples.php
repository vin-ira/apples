<?php

use yii\db\Migration;

/**
 * Class m230921_141559_alter_column_percent_eat_apples
 */
class m230921_141559_alter_column_percent_eat_apples extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn(
            'apples',
            'percent_eat',
            $this->decimal(10,2)->defaultValue(0.00)->comment('Съели (%)')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m230921_141559_alter_column_percent_eat_apples cannot be reverted.\n";

        return false;
    }
}
