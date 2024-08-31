<?php

namespace frontend\modules\membership\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\modules\membership\models\Members;

/**
 * MembersSearch represents the model behind the search form of `frontend\modules\membership\models\Members`.
 */
class MembersSearch extends Members
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'userId', 'countryId', 'townId', 'recordBy', 'updatedBy'], 'integer'],
            [['surname', 'otherNames', 'gender', 'dob', 'phoneNo', 'email', 'interests', 'recordDate', 'updateDate'], 'safe'],
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
        $query = Members::find();

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
            'userId' => $this->userId,
            'dob' => $this->dob,
            'countryId' => $this->countryId,
            'townId' => $this->townId,
            'recordBy' => $this->recordBy,
            'recordDate' => $this->recordDate,
            'updatedBy' => $this->updatedBy,
            'updateDate' => $this->updateDate,
        ]);

        $query->andFilterWhere(['like', 'surname', $this->surname])
            ->andFilterWhere(['like', 'otherNames', $this->otherNames])
            ->andFilterWhere(['like', 'gender', $this->gender])
            ->andFilterWhere(['like', 'phoneNo', $this->phoneNo])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'interests', $this->interests]);

        return $dataProvider;
    }
}
