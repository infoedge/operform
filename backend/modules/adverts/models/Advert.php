<?php

namespace app\modules\adverts\models;

use Yii;

/**
 * This is the model class for table "advert".
 *
 * @property int $id
 * @property int $ownerId
 * @property string $adTitle
 * @property string|null $adNarrative
 * @property int|null $entranceAnticId
 * @property int|null $outAnticId
 * @property string|null $banner
 * @property string $adStartDate
 * @property string|null $adEndDate
 * @property int $recordBy
 * @property string $recordDate
 * @property int|null $updatedBy
 * @property string|null $updateDate
 *
 * @property AdCampaign[] $adCampaigns
 * @property AdAntics $entranceAntic
 * @property AdAntics $outAntic
 * @property Members $owner
 * @property User $recordBy0
 * @property User $updatedBy0
 */
class Advert extends \yii\db\ActiveRecord
{
    public $myAdStartDate;
    public $myAdEndDate;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'advert';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ownerId', 'adTitle', 'adStartDate'], 'required'],
            [['ownerId', 'entranceAnticId', 'outAnticId', 'recordBy', 'updatedBy'], 'integer'],
            [['adNarrative'], 'string'],
            [['adStartDate','myAdStartDate', 'adEndDate','myAdEndDate', 'recordDate', 'updateDate'], 'safe'],
            [['adTitle'], 'string', 'max' => 50],
            [['ibanner'], 'string', 'max' => 255],
            [['adTitle'], 'unique'],
            [['entranceAnticId'], 'exist', 'skipOnError' => true, 'targetClass' => AdAntics::class, 'targetAttribute' => ['entranceAnticId' => 'id']],
            [['outAnticId'], 'exist', 'skipOnError' => true, 'targetClass' => AdAntics::class, 'targetAttribute' => ['outAnticId' => 'id']],
            [['ownerId'], 'exist', 'skipOnError' => true, 'targetClass' => Members::class, 'targetAttribute' => ['ownerId' => 'id']],
            [['recordBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['recordBy' => 'id']],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updatedBy' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ownerId' => Yii::t('app', 'Owner'),
            'adTitle' => Yii::t('app', 'Ad Title'),
            'adNarrative' => Yii::t('app', 'Ad Narrative'),
            'entranceAnticId' => Yii::t('app', 'Entrance Antic'),
            'outAnticId' => Yii::t('app', 'Out Antic'),
            'ibanner' => Yii::t('app', 'Banner'),
            'adStartDate' => Yii::t('app', 'Ad Start Date'),
            'myAdStartDate' => Yii::t('app', 'Ad Start Date'),
            'adEndDate' => Yii::t('app', 'Ad End Date'),
            'myAdEndDate' => Yii::t('app', 'Ad End Date'),
            'recordBy' => Yii::t('app', 'Record By'),
            'recordDate' => Yii::t('app', 'Record Date'),
            'updatedBy' => Yii::t('app', 'Updated By'),
            'updateDate' => Yii::t('app', 'Update Date'),
        ];
    }

    /**
     * Gets query for [[AdCampaigns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdCampaigns()
    {
        return $this->hasMany(AdCampaign::class, ['adId' => 'id']);
    }

    /**
     * Gets query for [[EntranceAntic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEntranceAntic()
    {
        return $this->hasOne(AdAntics::class, ['id' => 'entranceAnticId']);
    }

    /**
     * Gets query for [[OutAntic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOutAntic()
    {
        return $this->hasOne(AdAntics::class, ['id' => 'outAnticId']);
    }

    /**
     * Gets query for [[Owner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Members::class, ['id' => 'ownerId']);
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

    /**
     * Gets query for [[UpdatedBy0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy0()
    {
        return $this->hasOne(User::class, ['id' => 'updatedBy']);
    }
    
    public function getFullAdvertName()
    {
        return $this->adTitle.': '.$this->adNarrative;
    }
}
