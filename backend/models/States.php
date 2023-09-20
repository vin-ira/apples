<?php

namespace backend\models;

/**
 * This is the model class for table "states".
 *
 * @property int $id Идентификатор
 * @property string $state Состояние
 *
 * @property Apples[] $apples
 */
class States extends \yii\db\ActiveRecord
{
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
            [['state'], 'required'],
            [['state'], 'string', 'max' => 255],
            [['state'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'state' => 'Состояние',
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
