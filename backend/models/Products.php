<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id Идентификатор
 * @property string $name Название
 *
 * @property Storage[] $storages
 * @property Supprodcnt[] $supprodcnts
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
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
            'name' => 'Название',
        ];
    }

    /**
     * Gets query for [[Storages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStorages()
    {
        return $this->hasMany(Storage::class, ['id_p' => 'id']);
    }

    /**
     * Gets query for [[Supprodcnts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupprodcnts()
    {
        return $this->hasMany(Supprodcnt::class, ['id_p' => 'id']);
    }
}
