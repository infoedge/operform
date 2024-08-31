<?php

namespace app\modules\purchases\models;

use Yii;
use yii\helpers\Html;

/**
 * This is the model class for table "order_item".
 *
 * @property int $id
 * @property int $ordersId
 * @property int $priceListId
 * @property float $quantity
 * @property float $totalAmt
 * @property int|null $isCancelled
 * @property string|null $cancelDate
 * @property int $requiresDelivery
 * @property int $recordBy
 * @property string $recordDate
 * @property int|null $updatedBy
 * @property string|null $updateDate
 *
 * @property OrderDelivery[] $orderDeliveries
 * @property Orders $orders
 * @property PriceList $priceList
 * @property User $recordBy0
 * @property User $updatedBy0
 */
class OrderItem extends \yii\db\ActiveRecord
{
    public $productPrice;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ordersId', 'priceListId', 'recordBy'], 'required'],
            [['ordersId', 'priceListId', 'isCancelled', 'requiresDelivery', 'recordBy', 'updatedBy'], 'integer'],
            [['quantity', 'totalAmt'], 'number'],
            [['cancelDate', 'recordDate', 'updateDate'], 'safe'],
            [['ordersId'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::class, 'targetAttribute' => ['ordersId' => 'id']],
            [['priceListId'], 'exist', 'skipOnError' => true, 'targetClass' => PriceList::class, 'targetAttribute' => ['priceListId' => 'id']],
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
            'ordersId' => Yii::t('app', 'Orders ID'),
            'priceListId' => Yii::t('app', 'Required ?'),
            'quantity' => Yii::t('app', 'Quantity Required'),
            'totalAmt' => Yii::t('app', 'Total Amount ($ US)'),
            'isCancelled' => Yii::t('app', 'Cancel ?'),
            'cancelDate' => Yii::t('app', 'Cancel Date'),
            'requiresDelivery' => Yii::t('app', 'Requires Delivery ?'),
            'recordBy' => Yii::t('app', 'Record By'),
            'recordDate' => Yii::t('app', 'Record Date'),
            'updatedBy' => Yii::t('app', 'Updated By'),
            'updateDate' => Yii::t('app', 'Update Date'),
        ];
    }

    /**
     * Gets query for [[OrderDeliveries]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDeliveries()
    {
        return $this->hasMany(OrderDelivery::class, ['orderItemId' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasOne(Orders::class, ['id' => 'ordersId']);
    }

    /**
     * Gets query for [[PriceList]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPriceList()
    {
        return $this->hasOne(PriceList::class, ['id' => 'priceListId']);
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
