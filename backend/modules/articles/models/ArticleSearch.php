<?php

namespace app\modules\articles\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\articles\models\Article;

/**
 * ArticleSearch represents the model behind the search form of `app\modules\articles\models\Article`.
 */
class ArticleSearch extends Article
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'catId', 'author', 'editor', 'published', 'publisher', 'articleOrder', 'featured', 'recordBy'], 'integer'],
            [['articleTitle', 'articleNarration', 'articleIntro', 'articleIntroImg', 'publishDate', 'startDate', 'endDate', 'editDate', 'recordDate'], 'safe'],
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
        $query = Article::find()->orderBy('id DESC');

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
            'catId' => $this->catId,
            'publishDate' => $this->publishDate,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
            'author' => $this->author,
            'editor' => $this->editor,
            'editDate' => $this->editDate,
            'published' => $this->published,
            'publisher' => $this->publisher,
            'articleOrder' => $this->articleOrder,
            'featured' => $this->featured,
            'recordBy' => $this->recordBy,
            'recordDate' => $this->recordDate,
        ]);

        $query->andFilterWhere(['like', 'articleTitle', $this->articleTitle])
            ->andFilterWhere(['like', 'articleNarration', $this->articleNarration])
            ->andFilterWhere(['like', 'articleIntro', $this->articleIntro])
            ->andFilterWhere(['like', 'articleIntroImg', $this->articleIntroImg]);

        return $dataProvider;
    }
    
    
}
