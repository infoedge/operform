<?php

namespace app\modules\purchases\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $memberId
 * @property string $orderDate
 * @property float|null $orderAmt
 * @property int $requiresDelivery
 * @property int $recordBy
 * @property string $recordDate
 * @property int|null $updatedBy
 * @property string|null $updateDate
 *
 * @property Invoices[] $invoices
 * @property Members $member
 * @property OrderItem[] $orderItems
 * @property User $recordBy0
 * @property User $updatedBy0
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['memberId', 'orderDate', 'recordBy'], 'required'],
            [['memberId', 'requiresDelivery', 'recordBy', 'updatedBy'], 'integer'],
            [['orderDate', 'recordDate', 'updateDate'], 'safe'],
            [['orderAmt'], 'number'],
            [['memberId'], 'exist', 'skipOnError' => true, 'targetClass' => Members::class, 'targetAttribute' => ['memberId' => 'id']],
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
            'memberId' => Yii::t('app', 'Member ID'),
            'orderDate' => Yii::t('app', 'Order Date'),
            'orderAmt' => Yii::t('app', 'Order Amt'),
            'requiresDelivery' => Yii::t('app', 'Requires Delivery'),
            'recordBy' => Yii::t('app', 'Record By'),
            'recordDate' => Yii::t('app', 'Record Date'),
            'updatedBy' => Yii::t('app', 'Updated By'),
            'updateDate' => Yii::t('app', 'Update Date'),
        ];
    }

    /**
     * Gets query for [[Invoices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoices::class, ['orderId' => 'id']);
    }

    /**
     * Gets query for [[Member]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(Members::class, ['id' => 'memberId']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['ordersId' => 'id']);
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
