<?php

namespace backend\modules\general\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\general\models\Towns;

/**
 * TownsSearch represents the model behind the search form of `backend\modules\general\models\Towns`.
 */
class TownsSearch extends Towns
{
    public function attributes() {
         return array_merge(parent::attributes(),['region.regionName','region.country.name']);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'regionId'], 'integer'],
            [['townName', 'geoNameId','region.regionName','region.country.name'], 'safe'],
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
        $query = Towns::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $query->joinWith(['region','region.country']);
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'regionId' => $this->regionId,
        ]);

        $query->andFilterWhere(['like', 'townName', $this->townName])
                ->andFilterWhere(['like', 'geoNameId', $this->geoNameId])
                ->andFilterWhere(['like', 'region.regionName', $this->getAttribute('region.regionName')])
                ->andFilterWhere(['like', 'region.country.name', $this->getAttribute('region.country.name')]);

        return $dataProvider;
    }
}
