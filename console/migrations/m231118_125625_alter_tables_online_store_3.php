<?php

use yii\db\Migration;

/**
 * Class m231118_125625_alter_tables_online_store_3
 */
class m231118_125625_alter_tables_online_store_3 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('supprodcnt', ['id_s' => 1, 'id_p' => 1, 'price_min' => 435.20, 'cnt' => 2]);
        $this->insert('supprodcnt', ['id_s' => 1, 'id_p' => 2, 'price_min' => 685.00, 'cnt' => 5]);
        $this->insert('supprodcnt', ['id_s' => 2, 'id_p' => 1, 'price_min' => 450.00, 'cnt' => 3]);
        $this->insert('supprodcnt', ['id_s' => 2, 'id_p' => 3, 'price_min' => 1520.00, 'cnt' => 8]);
        $this->insert('supprodcnt', ['id_s' => 3, 'id_p' => 3, 'price_min' => 1680.00, 'cnt' => 10]);
        $this->insert('supprodcnt', ['id_s' => 3, 'id_p' => 1, 'price_min' => 440.50, 'cnt' => 4]);
        $this->insert('supprodcnt', ['id_s' => 2, 'id_p' => 2, 'price_min' => 700.00, 'cnt' => 7]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231118_125625_alter_tables_online_store_3 cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m231118_125625_alter_tables_online_store_3 cannot be reverted.\n";

        return false;
    }
    */
}
