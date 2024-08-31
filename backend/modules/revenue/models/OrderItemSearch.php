<?php

namespace backend\modules\revenue\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\revenue\models\OrderItem;

/**
 * OrderItemSearch represents the model behind the search form of `backend\modules\revenue\models\OrderItem`.
 */
class OrderItemSearch extends OrderItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ordersId', 'priceListId', 'isCancelled', 'requiresDelivery', 'recordBy', 'updatedBy'], 'integer'],
            [['quantity', 'totalAmt'], 'number'],
            [['cancelDate', 'recordDate', 'updateDate'], 'safe'],
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
        $query = OrderItem::find();

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
            'ordersId' => $this->ordersId,
            'priceListId' => $this->priceListId,
            'quantity' => $this->quantity,
            'totalAmt' => $this->totalAmt,
            'isCancelled' => $this->isCancelled,
            'cancelDate' => $this->cancelDate,
            'requiresDelivery' => $this->requiresDelivery,
            'recordBy' => $this->recordBy,
            'recordDate' => $this->recordDate,
            'updatedBy' => $this->updatedBy,
            'updateDate' => $this->updateDate,
        ]);

        return $dataProvider;
    }
    
    /////////////////////////////
    
    public function searchByOrderId($orderId,$params)
    {
        $query = OrderItem::find();

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
            'ordersId' => $orderId,
            'priceListId' => $this->priceListId,
            'quantity' => $this->quantity,
            'totalAmt' => $this->totalAmt,
            'isCancelled' => $this->isCancelled,
            'cancelDate' => $this->cancelDate,
            'requiresDelivery' => $this->requiresDelivery,
            'recordBy' => $this->recordBy,
            'recordDate' => $this->recordDate,
            'updatedBy' => $this->updatedBy,
            'updateDate' => $this->updateDate,
        ]);

        return $dataProvider;
    }
}
