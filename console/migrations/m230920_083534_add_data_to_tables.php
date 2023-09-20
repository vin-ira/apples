<?php

use yii\db\Migration;

/**
 * Class m230920_083534_add_data_to_tables
 */
class m230920_083534_add_data_to_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('colors', ['color' => 'зеленый']);
        $this->insert('colors', ['color' => 'желтый']);
        $this->insert('colors', ['color' => 'красный']);

        $this->insert('states', ['state' => 'висит на дереве']);
        $this->insert('states', ['state' => 'упало/лежит на земле']);
        $this->insert('states', ['state' => 'гнилое яблоко']);

        $this->insert('statuses', ['status' => 'на дереве']);
        $this->insert('statuses', ['status' => 'упало']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('colors');
        $this->delete('states');
        $this->delete('statuses');
    }
}
