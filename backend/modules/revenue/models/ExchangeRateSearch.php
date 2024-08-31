<?php

namespace backend\modules\revenue\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\revenue\models\ExchangeRate;

/**
 * ExchangeRateSearch represents the model behind the search form of `backend\modules\revenue\models\ExchangeRate`.
 */
class ExchangeRateSearch extends ExchangeRate
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'currencyId', 'recordBy', 'updatedBy'], 'integer'],
            [['currencySymbol', 'startDate', 'endDate', 'recordDate', 'updateDate'], 'safe'],
            [['rateAmt'], 'number'],
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
        $query = ExchangeRate::find();

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
            'currencyId' => $this->currencyId,
            'rateAmt' => $this->rateAmt,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'recordBy' => $this->recordBy,
            'recordDate' => $this->recordDate,
            'updatedBy' => $this->updatedBy,
            'updateDate' => $this->updateDate,
        ]);

        $query->andFilterWhere(['like', 'currencySymbol', $this->currencySymbol]);

        return $dataProvider;
    }
}
