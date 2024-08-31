<?php

namespace backend\modules\general\models;

use Yii;

/**
 * This is the model class for table "job_titles".
 *
 * @property int $id
 * @property string $titleName
 *
 * @property Members[] $members
 */
class JobTitles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'job_titles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titleName'], 'required'],
            [['titleName'], 'string', 'max' => 30],
            [['titleName'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'titleName' => Yii::t('app', 'Title Name'),
        ];
    }

    /**
     * Gets query for [[Members]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Members::class, ['jobTitleId' => 'id']);
    }
}
