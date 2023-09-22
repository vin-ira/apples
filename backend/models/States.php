<?php

namespace backend\models;

/**
 * This is the model class for table "states".
 *
 * @property int $id Идентификатор
 * @property string $name Состояние
 *
 * @property Apples[] $apples
 */
class States extends \yii\db\ActiveRecord
{
    const ON_TREE = 1;
    const ON_GROUND = 2;
    const ROTTEN = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'states';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'name' => 'Состояние',
        ];
    }

    /**
     * Gets query for [[Apples]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApples()
    {
        return $this->hasMany(Apples::class, ['state_id' => 'id']);
    }
}
