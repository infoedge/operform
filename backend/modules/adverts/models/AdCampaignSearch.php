<?php

namespace app\modules\adverts\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\adverts\models\AdCampaign;

/**
 * AdCampaignSearch represents the model behind the search form of `app\modules\adverts\models\AdCampaign`.
 */
class AdCampaignSearch extends AdCampaign
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'adId', 'adPayTypeId', 'requestedBy'], 'integer'],
            [['startDate'], 'safe'],
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
        $query = AdCampaign::find();

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
            'adId' => $this->adId,
            'adPayTypeId' => $this->adPayTypeId,
            'startDate' => $this->startDate,
            'requestedBy' => $this->requestedBy,
        ]);

        return $dataProvider;
    }
}
