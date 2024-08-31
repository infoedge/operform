<?php

namespace backend\modules\general\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\general\models\Industry;

/**
 * IndustrySearch represents the model behind the search form of `backend\modules\general\models\Industry`.
 */
class IndustrySearch extends Industry
{
    public function attributes() {
        return array_merge(parent::attributes(),['grp.grpName']);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'grpId'], 'integer'],
            [['industryName','grp.grpName'], 'safe'],
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
        $query = Industry::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $query->joinWith(['grp as mygroup']);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'grpId' => $this->grpId,
        ]);

        $query->andFilterWhere(['like', 'industryName', $this->industryName]);
        $query->andFilterWhere(['like', 'mygroup.grpName', $this->getAttribute('grp.grpName')]);

        return $dataProvider;
    }
}
