<?php

namespace app\modules\articles\models;

use Yii;

/**
 * This is the model class for table "article_display".
 *
 * @property int $id
 * @property int $catId
 * @property int $leadingArticles
 * @property int $cols
 * @property int $articleRows
 * @property int $linkRows
 * @property int $articleOrder
 *
 * @property Category $cat
 */
class ArticleDisplay extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article_display';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catId'], 'required'],
            [['catId', 'leadingArticles', 'cols', 'articleRows', 'linkRows', 'articleOrder'], 'integer'],
            [['catId'], 'unique'],
            [['catId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['catId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'catId' => Yii::t('app', 'Cat ID'),
            'leadingArticles' => Yii::t('app', 'Leading Articles'),
            'cols' => Yii::t('app', 'Cols'),
            'articleRows' => Yii::t('app', 'Article Rows'),
            'linkRows' => Yii::t('app', 'Link Rows'),
            'articleOrder' => Yii::t('app', 'Article Order'),
        ];
    }

    /**
     * Gets query for [[Cat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Category::class, ['id' => 'catId']);
    }
}
