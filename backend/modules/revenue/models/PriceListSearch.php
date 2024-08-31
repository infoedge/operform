<?php

namespace backend\modules\revenue\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\revenue\models\PriceList;

/**
 * PriceListSearch represents the model behind the search form of `backend\modules\revenue\models\PriceList`.
 */
class PriceListSearch extends PriceList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'productId', 'recordBy', 'updatedBy'], 'integer'],
            [['price'], 'number'],
            [['startDate', 'endDate', 'recordDate', 'updateDate'], 'safe'],
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
        $query = PriceList::find();

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
            'productId' => $this->productId,
            'price' => $this->price,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'recordBy' => $this->recordBy,
            'recordDate' => $this->recordDate,
            'updatedBy' => $this->updatedBy,
            'updateDate' => $this->updateDate,
        ]);

        return $dataProvider;
    }
}
