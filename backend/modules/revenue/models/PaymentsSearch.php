<?php

namespace backend\modules\revenue\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\revenue\models\Payments;

/**
 * PaymentsSearch represents the model behind the search form of `backend\modules\revenue\models\Payments`.
 */
class PaymentsSearch extends Payments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'invoiceId', 'pmtModeId', 'recordBy', 'updatedBy'], 'integer'],
            [['transId', 'pmtDate', 'pmtCurrency', 'recordDate', 'updateDate'], 'safe'],
            [['exchRate', 'amtPaid'], 'number'],
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
        $query = Payments::find();

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
            'invoiceId' => $this->invoiceId,
            'pmtModeId' => $this->pmtModeId,
            'pmtDate' => $this->pmtDate,
            'exchRate' => $this->exchRate,
            'amtPaid' => $this->amtPaid,
            'recordBy' => $this->recordBy,
            'recordDate' => $this->recordDate,
            'updatedBy' => $this->updatedBy,
            'updateDate' => $this->updateDate,
        ]);

        $query->andFilterWhere(['like', 'transId', $this->transId])
            ->andFilterWhere(['like', 'pmtCurrency', $this->pmtCurrency]);

        return $dataProvider;
    }
}
