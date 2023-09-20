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
        $this->insert('colors', ['name' => 'зеленый']);
        $this->insert('colors', ['name' => 'желтый']);
        $this->insert('colors', ['name' => 'красный']);

        $this->insert('states', ['name' => 'висит на дереве']);
        $this->insert('states', ['name' => 'упало/лежит на земле']);
        $this->insert('states', ['name' => 'гнилое яблоко']);

        $this->insert('statuses', ['name' => 'на дереве']);
        $this->insert('statuses', ['name' => 'упало']);
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
