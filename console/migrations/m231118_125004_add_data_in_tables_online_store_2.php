<?php

use yii\db\Migration;

/**
 * Class m231118_125004_add_data_in_tables_online_store_2
 */
class m231118_125004_add_data_in_tables_online_store_2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('sup_mar', ['id_s' => 1, 'id_m' => 10]);
        $this->insert('sup_mar', ['id_s' => 1, 'id_m' => 11]);
        $this->insert('sup_mar', ['id_s' => 1, 'id_m' => 12]);

        $this->insert('sup_mar', ['id_s' => 2, 'id_m' => 13]);
        $this->insert('sup_mar', ['id_s' => 2, 'id_m' => 14]);
        $this->insert('sup_mar', ['id_s' => 2, 'id_m' => 15]);

        $this->insert('sup_mar', ['id_s' => 3, 'id_m' => 16]);
        $this->insert('sup_mar', ['id_s' => 3, 'id_m' => 17]);
        $this->insert('sup_mar', ['id_s' => 3, 'id_m' => 18]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231118_125004_add_data_in_tables_online_store_2 cannot be reverted.\n";

        return false;
    }
}
