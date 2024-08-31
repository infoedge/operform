<?php

namespace frontend\modules\membership\models;

use Yii;

/**
 * This is the model class for table "towns".
 *
 * @property int $id
 * @property int $countryId
 * @property int $regionId
 * @property string $townName
 * @property string|null $geoNameId
 *
 * @property Country $country
 * @property Members[] $members
 * @property Regions $region
 */
class Towns extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'towns';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['countryId', 'regionId', 'townName'], 'required'],
            [['countryId', 'regionId'], 'integer'],
            [['townName'], 'string', 'max' => 80],
            [['geoNameId'], 'string', 'max' => 20],
            [['countryId'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['countryId' => 'id']],
            [['regionId'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::class, 'targetAttribute' => ['regionId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'countryId' => Yii::t('app', 'Country ID'),
            'regionId' => Yii::t('app', 'Region ID'),
            'townName' => Yii::t('app', 'Town Name'),
            'geoNameId' => Yii::t('app', 'Geo Name ID'),
        ];
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'countryId']);
    }

    /**
     * Gets query for [[Members]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Members::class, ['townId' => 'id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regions::class, ['id' => 'regionId']);
    }
}
