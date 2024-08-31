<?php

namespace backend\modules\revenue\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\revenue\models\ProductItem;

/**
 * ProductItemSearch represents the model behind the search form of `backend\modules\revenue\models\ProductItem`.
 */
class ProductItemSearch extends ProductItem
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'productTypeId', 'packingId', 'hasExpiry', 'expiryPeriod', 'recordBy'], 'integer'],
            [['productName', 'producer', 'code', 'version', 'description', 'recordDate'], 'safe'],
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
        $query = ProductItem::find();

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
            'productTypeId' => $this->productTypeId,
            'packingId' => $this->packingId,
            'hasExpiry' => $this->hasExpiry,
            'expiryPeriod' => $this->expiryPeriod,
            'recordBy' => $this->recordBy,
            'recordDate' => $this->recordDate,
        ]);

        $query->andFilterWhere(['like', 'productName', $this->productName])
            ->andFilterWhere(['like', 'producer', $this->producer])
            ->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'version', $this->version])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
