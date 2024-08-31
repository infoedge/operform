<?php

namespace backend\modules\revenue\models;

use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property int $id
 * @property int $invoiceId
 * @property int $pmtModeId
 * @property string $transId
 * @property string $pmtDate
 * @property string $pmtCurrency
 * @property float $exchRate
 * @property float $amtPaid
 * @property int $recordBy
 * @property string $recordDate
 * @property int|null $updatedBy
 * @property string|null $updateDate
 *
 * @property Invoices $invoice
 * @property PaymentModes $pmtMode
 * @property User $recordBy0
 * @property User $updatedBy0
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['invoiceId', 'pmtModeId', 'transId', 'pmtDate', 'pmtCurrency', 'recordBy'], 'required'],
            [['invoiceId', 'pmtModeId', 'recordBy', 'updatedBy'], 'integer'],
            [['pmtDate', 'recordDate', 'updateDate'], 'safe'],
            [['exchRate', 'amtPaid'], 'number'],
            [['transId'], 'string', 'max' => 30],
            [['pmtCurrency'], 'string', 'max' => 5],
            [['transId'], 'unique'],
            [['invoiceId'], 'exist', 'skipOnError' => true, 'targetClass' => Invoices::class, 'targetAttribute' => ['invoiceId' => 'id']],
            [['pmtModeId'], 'exist', 'skipOnError' => true, 'targetClass' => PaymentModes::class, 'targetAttribute' => ['pmtModeId' => 'id']],
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
            'invoiceId' => Yii::t('app', 'Invoice ID'),
            'pmtModeId' => Yii::t('app', 'Pmt Mode ID'),
            'transId' => Yii::t('app', 'Trans ID'),
            'pmtDate' => Yii::t('app', 'Pmt Date'),
            'pmtCurrency' => Yii::t('app', 'Pmt Currency'),
            'exchRate' => Yii::t('app', 'Exch Rate'),
            'amtPaid' => Yii::t('app', 'Amt Paid'),
            'recordBy' => Yii::t('app', 'Record By'),
            'recordDate' => Yii::t('app', 'Record Date'),
            'updatedBy' => Yii::t('app', 'Updated By'),
            'updateDate' => Yii::t('app', 'Update Date'),
        ];
    }

    /**
     * Gets query for [[Invoice]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoices::class, ['id' => 'invoiceId']);
    }

    /**
     * Gets query for [[PmtMode]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPmtMode()
    {
        return $this->hasOne(PaymentModes::class, ['id' => 'pmtModeId']);
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
