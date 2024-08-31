<?php

namespace frontend\modules\membership\models;

use Yii;

/**
 * This is the model class for table "industry".
 *
 * @property int $id
 * @property int|null $grpId
 * @property string $industryName
 *
 * @property IndustryGroup $grp
 * @property Members[] $members
 */
class Industry extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'industry';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grpId'], 'integer'],
            [['industryName'], 'required'],
            [['industryName'], 'string', 'max' => 30],
            [['industryName'], 'unique'],
            [['grpId'], 'exist', 'skipOnError' => true, 'targetClass' => IndustryGroup::class, 'targetAttribute' => ['grpId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'grpId' => Yii::t('app', 'Grp ID'),
            'industryName' => Yii::t('app', 'Industry Name'),
        ];
    }

    /**
     * Gets query for [[Grp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getGrp()
    {
        return $this->hasOne(IndustryGroup::class, ['id' => 'grpId']);
    }

    /**
     * Gets query for [[Members]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Members::class, ['industryId' => 'id']);
    }
    
    public function getGroupName()
    {
        return $this->grp->grpName;
    }
}
