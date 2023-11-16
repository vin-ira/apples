<?php

use yii\db\Migration;

/**
 * Class m231116_145905_create_tables_online_store
 */
class m231116_145905_create_tables_online_store extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'suppliers',
            [
                'id' => $this->primaryKey()->comment('Идентификатор'),
                'name' => $this->string()->notNull()->unique()->comment('Название'),
                'type' => $this->string()->comment('Тип'),
            ]
        );

        $this->createTable(
            'products',
            [
                'id' => $this->primaryKey()->comment('Идентификатор'),
                'name' => $this->string()->notNull()->unique()->comment('Название'),
            ]
        );

        $this->createTable(
            'margins',
            [
                'id' => $this->primaryKey()->comment('Идентификатор'),
                'type' => $this->string()->notNull()->unique()->comment('Тип'),
                'part' => $this->decimal(10,2)->notNull()->defaultValue(0.00)->comment('Наценка (%)')
            ]
        );

        $this->createTable(
            'supProdCnt',
            [
                'id' => $this->primaryKey()->comment('Идентификатор'),
                'id_s' => $this->integer()->notNull()->comment('Поставщик'),
                'id_p' => $this->integer()->notNull()->comment('Товар'),
                'id_m' => $this->integer()->notNull()->comment('Наценка'),
                'price_min' => $this->decimal(10,2)->defaultValue(0.00)->comment('Мин. цена'),
                'price_sale' => $this->decimal(10,2)->defaultValue(0.00)->comment('Цена продажи'),
                'cnt' => $this->integer()->notNull()->comment('Кол-во'),
            ]
        );

        $this->createTable(
            'storage',
            [
                'id' => $this->primaryKey()->comment('Идентификатор'),
                'id_p' => $this->integer()->notNull()->comment('Товар'),
                'price_bay' => $this->decimal(10,2)->defaultValue(0.00)->comment('Цена покупки'),
                'price_sale' => $this->decimal(10,2)->defaultValue(0.00)->comment('Цена продажи'),
                'cnt' => $this->integer()->notNull()->comment('Кол-во'),
            ]
        );

        $this->addForeignKey(
            'fk-storage-id_p',
            'storage',
            'id_p',
            'products',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-supProdCnt-id_p',
            'supProdCnt',
            'id_p',
            'products',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-supProdCnt-id_s',
            'supProdCnt',
            'id_s',
            'suppliers',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-supProdCnt-id_m',
            'supProdCnt',
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
        echo "m231116_145905_create_tables_online_store cannot be reverted.\n";

        return false;
    }
}
