<?php

namespace backend\modules\revenue\models;

use Yii;

/**
 * This is the model class for table "invoices".
 *
 * @property int $id
 * @property int $orderId
 * @property string $invoiceDate
 * @property int $discountType
 * @property float $discountAmt
 * @property float $totalAmtDue
 * @property float $totalAmtPaid
 * @property int $recordBy
 * @property string $recordDate
 *
 * @property DiscountTypes $discountType0
 * @property Orders $order
 * @property User $recordBy0
 */
class Invoices extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoices';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderId', 'invoiceDate', 'discountType', 'recordBy'], 'required'],
            [['orderId', 'discountType', 'recordBy'], 'integer'],
            [['invoiceDate', 'recordDate'], 'safe'],
            [['discountAmt', 'totalAmtDue', 'totalAmtPaid'], 'number'],
            [['discountType'], 'exist', 'skipOnError' => true, 'targetClass' => DiscountTypes::class, 'targetAttribute' => ['discountType' => 'id']],
            [['orderId'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::class, 'targetAttribute' => ['orderId' => 'id']],
            [['recordBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['recordBy' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'orderId' => Yii::t('app', 'Order ID'),
            'invoiceDate' => Yii::t('app', 'Invoice Date'),
            'discountType' => Yii::t('app', 'Discount Type'),
            'discountAmt' => Yii::t('app', 'Discount Amt'),
            'totalAmtDue' => Yii::t('app', 'Total Amt Due'),
            'totalAmtPaid' => Yii::t('app', 'Total Amt Paid'),
            'recordBy' => Yii::t('app', 'Record By'),
            'recordDate' => Yii::t('app', 'Record Date'),
        ];
    }

    /**
     * Gets query for [[DiscountType0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiscountType0()
    {
        return $this->hasOne(DiscountTypes::class, ['id' => 'discountType']);
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::class, ['id' => 'orderId']);
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
}
