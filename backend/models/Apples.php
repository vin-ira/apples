<?php

namespace backend\models;

/**
 * This is the model class for table "apples".
 *
 * @property int $id Идентификатор
 * @property int $color_id Цвет
 * @property int $created_at Дата и время появления
 * @property int|null $fall_at Дата и время падения
 * @property int $status_id Статус
 * @property float $percent_eat Съели (%)
 * @property int $state_id Состояние
 *
 * @property Colors $color
 * @property States $state
 * @property Statuses $status
 */
class Apples extends \yii\db\ActiveRecord
{
    const MIN_GEN = 3;
    const MAX_GEN = 10;

    const MIN_CREATE_AT = '01.01.2023';
    const MAX_CREATE_AT = 'now';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'apples';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['color_id', 'created_at', 'status_id', 'state_id'], 'required'],
            [['color_id', 'created_at', 'fall_at', 'status_id', 'state_id'], 'integer'],
            [['percent_eat'], 'number'],
            [
                ['color_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Colors::class,
                'targetAttribute' => ['color_id' => 'id']
            ],
            [
                ['state_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => States::class,
                'targetAttribute' => ['state_id' => 'id']
            ],
            [
                ['status_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Statuses::class,
                'targetAttribute' => ['status_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Идентификатор',
            'color_id' => 'Цвет',
            'created_at' => 'Дата и время появления',
            'fall_at' => 'Дата и время падения',
            'status_id' => 'Статус',
            'percent_eat' => 'Съели (%)',
            'state_id' => 'Состояние',
        ];
    }

    /**
     * Gets query for [[Color]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(Colors::class, ['id' => 'color_id']);
    }

    /**
     * Gets query for [[State]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getState()
    {
        return $this->hasOne(States::class, ['id' => 'state_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Statuses::class, ['id' => 'status_id']);
    }

    public static function generate(): void
    {
        $colors = Colors::getColorList();

        $countApples = rand(self::MIN_GEN, self::MAX_GEN);

        for ($i = 0; $i < $countApples; $i++) {
            $model = new Apples();

            $model->color_id = array_rand($colors);
            $model->created_at = rand(strtotime(self::MIN_CREATE_AT), strtotime(self::MAX_CREATE_AT));
            $model->status_id = Statuses::ON_TREE;
            $model->state_id = States::ON_TREE;

            $model->save();
        }
    }
}
