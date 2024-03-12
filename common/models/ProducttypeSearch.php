<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Producttype;

/**
 * ProducttypeSearch represents the model behind the search form of `common\models\Producttype`.
 */
class ProducttypeSearch extends Producttype
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'productstate_id'], 'integer'],
            [['typename', 'image'], 'safe'],
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
        $query = Producttype::find();

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
            'productstate_id' => $this->productstate_id,
        ]);

        $query->andFilterWhere(['like', 'typename', $this->typename])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
