<?php

namespace app\modules\adverts\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\adverts\models\Advert;

/**
 * AdvertSearch represents the model behind the search form of `app\modules\adverts\models\Advert`.
 */
class AdvertSearch extends Advert
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ownerId', 'entranceAnticId', 'outAnticId', 'recordBy', 'updatedBy'], 'integer'],
            [['adTitle', 'adNarrative', 'ibanner', 'adStartDate', 'adEndDate', 'recordDate', 'updateDate'], 'safe'],
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
        $query = Advert::find();

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
            'ownerId' => $this->ownerId,
            'entranceAnticId' => $this->entranceAnticId,
            'outAnticId' => $this->outAnticId,
            'adStartDate' => $this->adStartDate,
            'adEndDate' => $this->adEndDate,
            'recordBy' => $this->recordBy,
            'recordDate' => $this->recordDate,
            'updatedBy' => $this->updatedBy,
            'updateDate' => $this->updateDate,
        ]);

        $query->andFilterWhere(['like', 'adTitle', $this->adTitle])
            ->andFilterWhere(['like', 'adNarrative', $this->adNarrative])
            ->andFilterWhere(['like', 'ibanner', $this->ibanner]);

        return $dataProvider;
    }
}
