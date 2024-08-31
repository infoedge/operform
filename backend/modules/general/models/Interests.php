<?php

namespace backend\modules\general\models;

use Yii;

/**
 * This is the model class for table "interests".
 *
 * @property int $id
 * @property int|null $interestGroupId
 * @property string $interestName
 * @property string $startDate
 * @property string|null $endDate
 * @property int $recordBy
 * @property string $recordDate
 *
 * @property InterestGroups $interestGroup
 * @property User $recordBy0
 */
class Interests extends \yii\db\ActiveRecord
{
    public $myStartDate;
    public $myEndDate;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'interests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['interestName', 'myStartDate'], 'required'],
            [['interestGroupId','recordBy'], 'integer'],
            [['startDate', 'endDate','myStartDate','myEndDate', 'recordDate'], 'safe'],
            [['interestName'], 'string', 'max' => 30],
            [['interestGroupId'], 'exist', 'skipOnError' => true, 'targetClass' => InterestGroups::class, 'targetAttribute' => ['interestGroupId' => 'id']],
            [['recordBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['recordBy' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'interestGroupId' => Yii::t('app', 'Interest Group ID'),
            'interestName' => Yii::t('app', 'Interest Name'),
            'startDate' => Yii::t('app', 'Start Date'),
            'endDate' => Yii::t('app', 'End Date'),
            'myStartDate' => Yii::t('app', 'Start Date'),
            'myEndDate' => Yii::t('app', 'End Date'),
            'recordBy' => Yii::t('app', 'Record By'),
            'recordDate' => Yii::t('app', 'Record Date'),
        ];
    }

    /**
     * Gets query for [[InterestGroup]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInterestGroup()
    {
        return $this->hasOne(InterestGroups::class, ['id' => 'interestGroupId']);
    }

    /**
     * Gets query for [[RecordBy0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRecordBy0()
    {
        return $this->hasOne(User::class, ['id' => 'recordBy']);
    }
}
