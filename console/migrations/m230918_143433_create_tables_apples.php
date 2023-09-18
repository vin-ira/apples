<?php

use yii\db\Migration;

/**
 * Class m230918_143433_create_tables_apples
 */
class m230918_143433_create_tables_apples extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'colors',
            [
                'id' => $this->primaryKey()->comment('Идентификатор'),
                'color' => $this->string()->notNull()->unique()->comment('Цвет'),
            ]
        );

        $this->createTable(
            'statuses',
            [
                'id' => $this->primaryKey()->comment('Идентификатор'),
                'status' => $this->string()->notNull()->unique()->comment('Статус'),
            ]
        );

        $this->createTable(
            'states',
            [
                'id' => $this->primaryKey()->comment('Идентификатор'),
                'state' => $this->string()->notNull()->unique()->comment('Состояние'),
            ]
        );

        $this->createTable(
            'apples',
            [
                'id' => $this->primaryKey()->comment('Идентификатор'),
                'color_id' => $this->integer()->notNull()->comment('Цвет'),
                'created_at' => $this->timestamp()->notNull()->comment('Дата и время появления'),
                'fall_at' => $this->timestamp()->null()->comment('Дата и время падения'),
                'status_id' => $this->integer()->notNull()->comment('Статус'),
                'percent_eat' => $this->decimal()->null()->comment('Съели (%)'),
                'state_id' => $this->integer()->null()->comment('Состояние'),
            ]
        );

        $this->addForeignKey(
            'fk-apples-color_id',
            'apples',
            'color_id',
            'colors',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-apples-status_id',
            'apples',
            'status_id',
            'statuses',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-apples-state_id',
            'apples',
            'state_id',
            'states',
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
        $this->dropForeignKey('fk-apples-state_id', 'apples');
        $this->dropForeignKey('fk-apples-status_id', 'apples');
        $this->dropForeignKey('fk-apples-color_id', 'apples');

        $this->dropTable('apples');
        $this->dropTable('states');
        $this->dropTable('statuses');
        $this->dropTable('colors');
    }
}
