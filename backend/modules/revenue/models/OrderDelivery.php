<?php

namespace backend\modules\revenue\models;

use Yii;

/**
 * This is the model class for table "order_delivery".
 *
 * @property int $id
 * @property int $orderItemId
 * @property int|null $deliveryTown
 * @property int|null $deliveryMode
 * @property string|null $deliveryDate
 * @property float $deliveryAmt
 * @property string $recordDate
 * @property int|null $updatedBy
 * @property string|null $updateDate
 *
 * @property DeliveryModes $deliveryMode0
 * @property Towns $deliveryTown0
 * @property OrderItem $orderItem
 * @property User $updatedBy0
 */
class OrderDelivery extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_delivery';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderItemId'], 'required'],
            [['orderItemId', 'deliveryTown', 'deliveryMode', 'updatedBy'], 'integer'],
            [['deliveryDate', 'recordDate', 'updateDate'], 'safe'],
            [['deliveryAmt'], 'number'],
            [['deliveryMode'], 'exist', 'skipOnError' => true, 'targetClass' => DeliveryModes::class, 'targetAttribute' => ['deliveryMode' => 'id']],
            [['deliveryTown'], 'exist', 'skipOnError' => true, 'targetClass' => Towns::class, 'targetAttribute' => ['deliveryTown' => 'id']],
            [['orderItemId'], 'exist', 'skipOnError' => true, 'targetClass' => OrderItem::class, 'targetAttribute' => ['orderItemId' => 'id']],
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
            'orderItemId' => Yii::t('app', 'Order Item ID'),
            'deliveryTown' => Yii::t('app', 'Delivery Town'),
            'deliveryMode' => Yii::t('app', 'Delivery Mode'),
            'deliveryDate' => Yii::t('app', 'Delivery Date'),
            'deliveryAmt' => Yii::t('app', 'Delivery Amt'),
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
     * Gets query for [[OrderItem]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItem()
    {
        return $this->hasOne(OrderItem::class, ['id' => 'orderItemId']);
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
