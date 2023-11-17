<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "margins".
 *
 * @property int $id Идентификатор
 * @property string $type Тип
 * @property float $part Наценка (%)
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
            [['part'], 'number'],
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
