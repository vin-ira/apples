<?php

namespace backend\models;

/**
 * This is the model class for table "statuses".
 *
 * @property int $id Идентификатор
 * @property string $name Статус
 *
 * @property Apples[] $apples
 */
class Statuses extends \yii\db\ActiveRecord
{
    const ON_TREE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'statuses';
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
            'name' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Apples]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApples()
    {
        return $this->hasMany(Apples::class, ['status_id' => 'id']);
    }
}
