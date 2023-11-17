<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "storage".
 *
 * @property int $id Идентификатор
 * @property int $id_p Товар
 * @property float|null $price_bay Цена покупки
 * @property float|null $price_sale Цена продажи
 * @property int $cnt Кол-во
 *
 * @property Products $p
 */
class Storage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'storage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_p', 'cnt'], 'required'],
            [['id_p', 'cnt'], 'integer'],
            [['price_bay', 'price_sale'], 'number'],
            [['id_p'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['id_p' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'id_p' => 'Товар',
            'price_bay' => 'Цена покупки',
            'price_sale' => 'Цена продажи',
            'cnt' => 'Кол-во',
        ];
    }

    /**
     * Gets query for [[P]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getP()
    {
        return $this->hasOne(Products::class, ['id' => 'id_p']);
    }
}
