<?php

namespace backend\modules\revenue\models;

use Yii;

/**
 * This is the model class for table "exchange_rate".
 *
 * @property int $id
 * @property int $currencyId
 * @property string $currencySymbol
 * @property float $rateAmt
 * @property string $startDate
 * @property string|null $endDate
 * @property int $recordBy
 * @property string $recordDate
 * @property int|null $updatedBy
 * @property string|null $updateDate
 *
 * @property Country $currency
 * @property User $recordBy0
 * @property User $updatedBy0
 */
class ExchangeRate extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'exchange_rate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['currencyId', 'currencySymbol', 'startDate', 'recordBy'], 'required'],
            [['currencyId', 'recordBy', 'updatedBy'], 'integer'],
            [['rateAmt'], 'number'],
            [['startDate', 'endDate', 'recordDate', 'updateDate'], 'safe'],
            [['currencySymbol'], 'string', 'max' => 5],
            [['currencyId'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['currencyId' => 'id']],
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
            'currencyId' => Yii::t('app', 'Currency ID'),
            'currencySymbol' => Yii::t('app', 'Currency Symbol'),
            'rateAmt' => Yii::t('app', 'Rate Amt'),
            'startDate' => Yii::t('app', 'Start Date'),
            'endDate' => Yii::t('app', 'End Date'),
            'recordBy' => Yii::t('app', 'Record By'),
            'recordDate' => Yii::t('app', 'Record Date'),
            'updatedBy' => Yii::t('app', 'Updated By'),
            'updateDate' => Yii::t('app', 'Update Date'),
        ];
    }

    /**
     * Gets query for [[Currency]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCurrency()
    {
        return $this->hasOne(Country::class, ['id' => 'currencyId']);
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
}
