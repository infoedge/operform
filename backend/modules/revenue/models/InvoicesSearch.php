<?php

namespace backend\modules\revenue\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\revenue\models\Invoices;

/**
 * InvoicesSearch represents the model behind the search form of `backend\modules\revenue\models\Invoices`.
 */
class InvoicesSearch extends Invoices
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'orderId', 'discountType', 'recordBy'], 'integer'],
            [['invoiceDate', 'recordDate'], 'safe'],
            [['discountAmt', 'totalAmtDue', 'totalAmtPaid'], 'number'],
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
        $query = Invoices::find();

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
            'orderId' => $this->orderId,
            'invoiceDate' => $this->invoiceDate,
            'discountType' => $this->discountType,
            'discountAmt' => $this->discountAmt,
            'totalAmtDue' => $this->totalAmtDue,
            'totalAmtPaid' => $this->totalAmtPaid,
            'recordBy' => $this->recordBy,
            'recordDate' => $this->recordDate,
        ]);

        return $dataProvider;
    }
}
