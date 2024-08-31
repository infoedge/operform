<?php

namespace backend\modules\general\models;

use Yii;

/**
 * This is the model class for table "industry_group".
 *
 * @property int $id
 * @property string $grpName
 *
 * @property Industry[] $industries
 */
class IndustryGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'industry_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['grpName'], 'required'],
            [['grpName'], 'string', 'max' => 20],
            [['grpName'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'grpName' => Yii::t('app', 'Group Name'),
        ];
    }

    /**
     * Gets query for [[Industries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndustries()
    {
        return $this->hasMany(Industry::class, ['grpId' => 'id']);
    }
}
