<?php

namespace backend\modules\revenue\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int $memberId
 * @property string $orderDate
 * @property int|null $deliveryTown
 * @property int $deliveryMode
 * @property string|null $deliveryDate
 * @property float $orderAmt
 * @property int $recordBy
 * @property string $recordDate
 * @property int|null $updatedBy
 * @property string|null $updateDate
 *
 * @property DeliveryModes $deliveryMode0
 * @property Towns $deliveryTown0
 * @property Invoices[] $invoices
 * @property Members $member
 * @property OrderItem[] $orderItems
 * @property User $recordBy0
 * @property User $updatedBy0
 */
class Orders extends \yii\db\ActiveRecord
{
    public $myOrderDate;
    public $myDeliveryDate;
    public $myCountry;
    public $myRegion;
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
            [['memberId', 'myOrderDate'], 'required'],
            [['memberId', 'deliveryTown', 'deliveryMode', 'recordBy','updatedBy','myCountry','myRegion'], 'integer'],
            [['orderDate', 'recordDate','myOrderDate','myDeliveryDate','updateDate'], 'safe'],
            [['orderAmt'], 'number'],
            [['deliveryMode'], 'exist', 'skipOnError' => true, 'targetClass' => DeliveryModes::class, 'targetAttribute' => ['deliveryMode' => 'id']],
            [['deliveryTown'], 'exist', 'skipOnError' => true, 'targetClass' => Towns::class, 'targetAttribute' => ['deliveryTown' => 'id']],
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
            'memberId' => Yii::t('app', 'Member Name'),
            'orderDate' => Yii::t('app', 'Order Date'),
            'myOrderDate' => Yii::t('app', 'Order Date'),
            'myCountry' => Yii::t('app', 'Country'),
            'myRegion' => Yii::t('app', 'Region'),
            'deliveryTown' => Yii::t('app', 'Town'),
            'deliveryMode' => Yii::t('app', 'Mode'),
            'deliveryDate' => Yii::t('app', 'Delivery Date'),
            'myDeliveryDate' => Yii::t('app', 'Date'),
            'orderAmt' => Yii::t('app', 'Order Amt'),
            'recordBy' => Yii::t('app', 'Record By'),
            'recordDate' => Yii::t('app', 'Record Date'),
            'updatedBy' => Yii::t('app', 'Updated By'),
            'updateDate' => Yii::t('app', 'Update Date'),
        ];
    }

    /**
     * Gets query for [[DeliveryMode0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryMode0()
    {
        return $this->hasOne(DeliveryModes::class, ['id' => 'deliveryMode']);
    }

    /**
     * Gets query for [[DeliveryTown0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDeliveryTown0()
    {
        return $this->hasOne(Towns::class, ['id' => 'deliveryTown']);
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
