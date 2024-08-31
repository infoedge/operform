<?php

namespace app\modules\adverts\models;

use Yii;

/**
 * This is the model class for table "ad_pay_type".
 *
 * @property int $id
 * @property string $adPayTypeName
 *
 * @property AdCampaign[] $adCampaigns
 */
class AdPayType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_pay_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['adPayTypeName'], 'required'],
            [['adPayTypeName'], 'string', 'max' => 255],
            [['adPayTypeName'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'adPayTypeName' => Yii::t('app', 'Ad Pay Type Name'),
        ];
    }

    /**
     * Gets query for [[AdCampaigns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdCampaigns()
    {
        return $this->hasMany(AdCampaign::class, ['adPayTypeId' => 'id']);
    }
}
