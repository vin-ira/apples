<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "margins".
 *
 * @property int $id Идентификатор
 * @property string $type Тип
 * @property float $part Наценка (%)
 * @property float|null $price_min Мин. цена
 * @property float|null $price_max Макс. цена
 *
 * @property Supprodcnt[] $supprodcnts
 */
class Margins extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'margins';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['part', 'price_min', 'price_max'], 'number'],
            [['type'], 'string', 'max' => 255],
            [['type'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'type' => 'Тип',
            'part' => 'Наценка (%)',
            'price_min' => 'Мин. цена',
            'price_max' => 'Макс. цена',
        ];
    }

    /**
     * Gets query for [[Supprodcnts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupprodcnts()
    {
        return $this->hasMany(Supprodcnt::class, ['id_m' => 'id']);
    }
}
