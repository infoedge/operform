<?php

namespace frontend\modules\membership\models;

use Yii;

/**
 * This is the model class for table "interest_groups".
 *
 * @property int $id
 * @property string $groupName
 *
 * @property Interests[] $interests
 */
class InterestGroups extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'interest_groups';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['groupName'], 'required'],
            [['groupName'], 'string', 'max' => 30],
            [['groupName'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'groupName' => Yii::t('app', 'Group Name'),
        ];
    }

    /**
     * Gets query for [[Interests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInterests()
    {
        return $this->hasMany(Interests::class, ['interestGroupId' => 'id']);
    }
}
