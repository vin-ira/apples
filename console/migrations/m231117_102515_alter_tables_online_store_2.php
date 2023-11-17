<?php

use yii\db\Migration;

/**
 * Class m231117_102515_alter_tables_online_store_2
 */
class m231117_102515_alter_tables_online_store_2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk-supProdCnt-id_m', 'supProdCnt');
        $this->dropColumn('supProdCnt', 'id_m');

        $this->createTable(
            'sup_mar',
            [
                'id' => $this->primaryKey()->comment('Идентификатор'),
                'id_s' => $this->integer()->notNull()->comment('Поставщик'),
                'id_m' => $this->integer()->notNull()->comment('Наценка'),
            ]
        );

        $this->addForeignKey(
            'fk-sup_mar-id_s',
            'sup_mar',
            'id_s',
            'suppliers',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-sup_mar-id_m',
            'sup_mar',
            'id_m',
            'margins',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m231117_102515_alter_tables_online_store_2 cannot be reverted.\n";

        return false;
    }
}
