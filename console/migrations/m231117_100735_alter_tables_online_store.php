<?php

use yii\db\Migration;

/**
 * Class m231117_100735_alter_tables_online_store
 */
class m231117_100735_alter_tables_online_store extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('margins', 'price_min', $this->decimal(10,2)->defaultValue(0.00)->comment('Мин. цена'));
        $this->addColumn('margins', 'price_max', $this->decimal(10,2)->defaultValue(0.00)->comment('Макс. цена'));

        $this->delete('margins');

        $this->insert('margins', ['type' => '0-499 А', 'part' => 0.50, 'price_min' => 0.00, 'price_max' => 499.00]);
        $this->insert('margins', ['type' => '500-999 А', 'part' => 0.45, 'price_min' => 500.00, 'price_max' => 999.00]);
        $this->insert('margins', ['type' => '1000-4999 А', 'part' => 0.40, 'price_min' => 1000.00, 'price_max' => 4999.00]);

        $this->insert('margins', ['type' => '0-499 Б', 'part' => 0.45, 'price_min' => 0.00, 'price_max' => 499.00]);
        $this->insert('margins', ['type' => '500-999 Б', 'part' => 0.40, 'price_min' => 500.00, 'price_max' => 999.00]);
        $this->insert('margins', ['type' => '1000-4999 Б', 'part' => 0.35, 'price_min' => 1000.00, 'price_max' => 4999.00]);

        $this->insert('margins', ['type' => '0-499 С', 'part' => 0.40, 'price_min' => 0.00, 'price_max' => 499.00]);
        $this->insert('margins', ['type' => '500-999 С', 'part' => 0.35, 'price_min' => 500.00, 'price_max' => 999.00]);
        $this->insert('margins', ['type' => '1000-4999 С', 'part' => 0.30, 'price_min' => 1000.00, 'price_max' => 4999.00]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231117_100735_alter_tables_online_store cannot be reverted.\n";

        return false;
    }
}
