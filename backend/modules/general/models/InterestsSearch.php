<?php

namespace backend\modules\general\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\general\models\Interests;

/**
 * InterestsSearch represents the model behind the search form of `backend\modules\general\models\Interests`.
 */
class InterestsSearch extends Interests
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'interestGroupId', 'recordBy'], 'integer'],
            [['interestName', 'startDate', 'endDate', 'recordDate'], 'safe'],
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
        $query = Interests::find();

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
            'interestGroupId' => $this->interestGroupId,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'recordBy' => $this->recordBy,
            'recordDate' => $this->recordDate,
        ]);

        $query->andFilterWhere(['like', 'interestName', $this->interestName]);

        return $dataProvider;
    }
}
