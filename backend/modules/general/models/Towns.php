<?php

namespace backend\modules\general\models;

use Yii;

/**
 * This is the model class for table "towns".
 *
 * @property int $id
 * @property int $regionId
 * @property string $townName
 * @property string|null $geoNameId
 *
 * @property Members[] $members
 * @property Regions $region
 */
class Towns extends \yii\db\ActiveRecord
{
    public $countryId;
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
            [['countryId','regionId', 'townName'], 'required'],
            [['regionId','countryId'], 'integer'],
            [['townName'], 'string', 'max' => 80],
            [['geoNameId'], 'string', 'max' => 20],
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
            'countryId' => Yii::t('app', 'Country'),
            'regionId' => Yii::t('app', 'Region/Area/Province/State/County'),
            'townName' => Yii::t('app', 'City/Town'),
            'geoNameId' => Yii::t('app', 'Geo Name ID'),
        ];
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
