<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "supprodcnt".
 *
 * @property int $id Идентификатор
 * @property int $id_s Поставщик
 * @property int $id_p Товар
 * @property float|null $price_min Мин. цена
 * @property float|null $price_sale Цена продажи
 * @property int $cnt Кол-во
 *
 * @property Products $p
 * @property Suppliers $s
 */
class Supprodcnt extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supprodcnt';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_s', 'id_p', 'cnt'], 'required'],
            [['id_s', 'id_p', 'cnt'], 'integer'],
            [['price_min', 'price_sale'], 'number'],
            [['id_p'], 'exist', 'skipOnError' => true, 'targetClass' => Products::class, 'targetAttribute' => ['id_p' => 'id']],
            [['id_s'], 'exist', 'skipOnError' => true, 'targetClass' => Suppliers::class, 'targetAttribute' => ['id_s' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'id_s' => 'Поставщик',
            'id_p' => 'Товар',
            'price_min' => 'Мин. цена',
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

    /**
     * Gets query for [[S]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getS()
    {
        return $this->hasOne(Suppliers::class, ['id' => 'id_s']);
    }
}
