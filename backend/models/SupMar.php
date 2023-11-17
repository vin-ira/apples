<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sup_mar".
 *
 * @property int $id Идентификатор
 * @property int $id_s Поставщик
 * @property int $id_m Наценка
 *
 * @property Margins $m
 * @property Suppliers $s
 */
class SupMar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sup_mar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_s', 'id_m'], 'required'],
            [['id_s', 'id_m'], 'integer'],
            [['id_m'], 'exist', 'skipOnError' => true, 'targetClass' => Margins::class, 'targetAttribute' => ['id_m' => 'id']],
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
            'id_m' => 'Наценка',
        ];
    }

    /**
     * Gets query for [[M]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getM()
    {
        return $this->hasOne(Margins::class, ['id' => 'id_m']);
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
