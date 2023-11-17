<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Supprodcnt;

/**
 * SupprodcntSearch represents the model behind the search form of `app\models\Supprodcnt`.
 */
class SupprodcntSearch extends Supprodcnt
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_s', 'id_p', 'id_m', 'cnt'], 'integer'],
            [['price_min', 'price_sale'], 'number'],
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
        $query = Supprodcnt::find();

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
            'id_s' => $this->id_s,
            'id_p' => $this->id_p,
            'id_m' => $this->id_m,
            'price_min' => $this->price_min,
            'price_sale' => $this->price_sale,
            'cnt' => $this->cnt,
        ]);

        return $dataProvider;
    }
}
