<?php

namespace backend\modules\general\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\general\models\Regions;

/**
 * RegionsSearch represents the model behind the search form of `backend\modules\general\models\Regions`.
 */
class RegionsSearch extends Regions
{
    public function attributes() {
        return array_merge(parent::attributes(),['country.name']);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'countryId'], 'integer'],
            [['regionName','country.name'], 'safe'],
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
        $query = Regions::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $query->joinWith(['country']);
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'countryId' => $this->countryId,
        ]);

        $query->andFilterWhere(['like', 'regionName', $this->regionName])
                ->andFilterWhere(['like','country.name', $this->getAttribute('country.name')]);

        return $dataProvider;
    }
}
