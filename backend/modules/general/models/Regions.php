<?php

namespace backend\modules\general\models;

use Yii;

/**
 * This is the model class for table "regions".
 *
 * @property int $id
 * @property int $countryId
 * @property string $regionName
 *
 * @property Country $country
 * @property Towns[] $towns
 */
class Regions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'regions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['countryId', 'regionName'], 'required'],
            [['countryId'], 'integer'],
            [['regionName'], 'string', 'max' => 80],
            [['countryId'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['countryId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'countryId' => Yii::t('app', 'Country Name'),
            'regionName' => Yii::t('app', 'Region Name'),
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
     * Gets query for [[Towns]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTowns()
    {
        return $this->hasMany(Towns::class, ['regionId' => 'id']);
    }
}
