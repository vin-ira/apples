<?php

namespace backend\models;

/**
 * This is the model class for table "colors".
 *
 * @property int $id Идентификатор
 * @property string $name Цвет
 *
 * @property Apples[] $apples
 */
class Colors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'colors';
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
            'name' => 'Цвет',
        ];
    }

    /**
     * Gets query for [[Apples]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApples()
    {
        return $this->hasMany(Apples::class, ['color_id' => 'id']);
    }

    public static function getColorList(): array
    {
        return self::find()
            ->select('name')
            ->indexBy('id')
            ->orderBy('name')
            ->asArray()
            ->column();
    }
}
