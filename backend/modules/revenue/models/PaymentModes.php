<?php

namespace backend\modules\revenue\models;

use Yii;

/**
 * This is the model class for table "payment_modes".
 *
 * @property int $id
 * @property string $pmtTypeName
 * @property string $startDate
 * @property string|null $endDate
 */
class PaymentModes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment_modes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pmtTypeName', 'startDate'], 'required'],
            [['startDate', 'endDate'], 'safe'],
            [['pmtTypeName'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'pmtTypeName' => Yii::t('app', 'Pmt Type Name'),
            'startDate' => Yii::t('app', 'Start Date'),
            'endDate' => Yii::t('app', 'End Date'),
        ];
    }
}
