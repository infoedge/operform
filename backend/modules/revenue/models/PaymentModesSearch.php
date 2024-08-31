<?php

namespace backend\modules\revenue\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\revenue\models\PaymentModes;

/**
 * PaymentModesSearch represents the model behind the search form of `backend\modules\revenue\models\PaymentModes`.
 */
class PaymentModesSearch extends PaymentModes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['pmtTypeName', 'startDate', 'endDate'], 'safe'],
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
        $query = PaymentModes::find();

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
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
        ]);

        $query->andFilterWhere(['like', 'pmtTypeName', $this->pmtTypeName]);

        return $dataProvider;
    }
}
