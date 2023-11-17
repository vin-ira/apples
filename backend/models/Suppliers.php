<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "suppliers".
 *
 * @property int $id Идентификатор
 * @property string $name Название
 * @property string|null $type Тип
 *
 * @property Supprodcnt[] $supprodcnts
 */
class Suppliers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'suppliers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'type'], 'string', 'max' => 255],
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
            'name' => 'Название',
            'type' => 'Тип',
        ];
    }

    /**
     * Gets query for [[Supprodcnts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupprodcnts()
    {
        return $this->hasMany(Supprodcnt::class, ['id_s' => 'id']);
    }
}
