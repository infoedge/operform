<?php

namespace backend\modules\general\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\general\models\SysConstants;

/**
 * SysConstantsSearch represents the model behind the search form of `backend\modules\general\models\SysConstants`.
 */
class SysConstantsSearch extends SysConstants
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'constantValue'], 'integer'],
            [['constantName', 'description'], 'safe'],
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
        $query = SysConstants::find();

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
            'constantValue' => $this->constantValue,
        ]);

        $query->andFilterWhere(['like', 'constantName', $this->constantName])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
