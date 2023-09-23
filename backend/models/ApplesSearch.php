<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ApplesSearch represents the model behind the search form of `backend\models\Apples`.
 */
class ApplesSearch extends Apples
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'color_id', 'status_id', 'state_id'], 'integer'],
            [['created_at', 'fall_at'], 'safe'],
            [['size_percent'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Apples::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'color_id' => $this->color_id,
            'created_at' => $this->created_at,
            'fall_at' => $this->fall_at,
            'status_id' => $this->status_id,
            'size_percent' => $this->size_percent,
            'state_id' => $this->state_id,
        ]);

        return $dataProvider;
    }
}
