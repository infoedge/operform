<?php

namespace app\modules\articles\models;

use Yii;

/**
 * This is the model class for table "publish_states".
 *
 * @property int $id
 * @property string $pubStateName
 *
 * @property Article[] $articles
 */
class PublishStates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'publish_states';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pubStateName'], 'required'],
            [['pubStateName'], 'string', 'max' => 50],
            [['pubStateName'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pubStateName' => Yii::t('app', 'Publish State Name'),
        ];
    }

    /**
     * Gets query for [[Articles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::class, ['published' => 'id']);
    }
}
