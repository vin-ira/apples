<?php

use yii\db\Migration;

/**
 * Class m231117_094249_add_data_in_tables_online_store
 */
class m231117_094249_add_data_in_tables_online_store extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('suppliers', ['name' => 'Поставщик А', 'type' => 'a']);
        $this->insert('suppliers', ['name' => 'Поставщик Б', 'type' => 'b']);
        $this->insert('suppliers', ['name' => 'Поставщик В', 'type' => 'c']);

        $this->insert('products', ['name' => 'Товар 1']);
        $this->insert('products', ['name' => 'Товар 2']);
        $this->insert('products', ['name' => 'Товар 3']);
        $this->insert('products', ['name' => 'Товар 4']);

        $this->insert('margins', ['type' => '0-499 А', 'part' => 0.50]);
        $this->insert('margins', ['type' => '500-999 А', 'part' => 0.45]);
        $this->insert('margins', ['type' => '1000-4999 А', 'part' => 0.40]);

        $this->insert('margins', ['type' => '0-499 Б', 'part' => 0.45]);
        $this->insert('margins', ['type' => '500-999 Б', 'part' => 0.40]);
        $this->insert('margins', ['type' => '1000-4999 Б', 'part' => 0.35]);

        $this->insert('margins', ['type' => '0-499 С', 'part' => 0.40]);
        $this->insert('margins', ['type' => '500-999 С', 'part' => 0.35]);
        $this->insert('margins', ['type' => '1000-4999 С', 'part' => 0.30]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('suppliers');
        $this->delete('products');
        $this->delete('margins');
    }
}
