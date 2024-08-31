<?php

namespace app\modules\adverts\models;

use Yii;

/**
 * This is the model class for table "ad_campaign".
 *
 * @property int $id
 * @property int $adId
 * @property int $adPayTypeId
 * @property string $startDate
 * @property int $requestedBy
 *
 * @property Advert $ad
 * @property AdPayType $adPayType
 * @property User $requestedBy0
 */
class AdCampaign extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_campaign';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['adId', 'adPayTypeId', 'startDate', 'requestedBy'], 'required'],
            [['adId', 'adPayTypeId', 'requestedBy'], 'integer'],
            [['startDate'], 'safe'],
            [['adId'], 'exist', 'skipOnError' => true, 'targetClass' => Advert::class, 'targetAttribute' => ['adId' => 'id']],
            [['adPayTypeId'], 'exist', 'skipOnError' => true, 'targetClass' => AdPayType::class, 'targetAttribute' => ['adPayTypeId' => 'id']],
            [['requestedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['requestedBy' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'adId' => Yii::t('app', 'Ad ID'),
            'adPayTypeId' => Yii::t('app', 'Ad Pay Type ID'),
            'startDate' => Yii::t('app', 'Start Date'),
            'requestedBy' => Yii::t('app', 'Requested By'),
        ];
    }

    /**
     * Gets query for [[Ad]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAd()
    {
        return $this->hasOne(Advert::class, ['id' => 'adId']);
    }

    /**
     * Gets query for [[AdPayType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdPayType()
    {
        return $this->hasOne(AdPayType::class, ['id' => 'adPayTypeId']);
    }

    /**
     * Gets query for [[RequestedBy0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRequestedBy0()
    {
        return $this->hasOne(User::class, ['id' => 'requestedBy']);
    }
}
