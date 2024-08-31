<?php

namespace backend\modules\revenue\models;

use Yii;

/**
 * This is the model class for table "price_list".
 *
 * @property int $id
 * @property int $productId
 * @property float $price
 * @property string $startDate
 * @property string|null $endDate
 * @property int $recordBy
 * @property string $recordDate
 * @property int|null $updatedBy
 * @property string|null $updateDate
 *
 * @property OrderItem[] $orderItems
 * @property ProductItem $product
 * @property User $recordBy0
 * @property User $updatedBy0
 */
class PriceList extends \yii\db\ActiveRecord
{
    public $myStartDate;
    public $myEndDate;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'price_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productId', 'myStartDate'], 'required'],
            [['productId', 'recordBy'], 'integer'],
            [['price'], 'number'],
            [['startDate', 'endDate', 'recordDate','myStartDate', 'myEndDate'], 'safe'],
            [['productId'], 'exist', 'skipOnError' => true, 'targetClass' => ProductItem::class, 'targetAttribute' => ['productId' => 'id']],
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
            'productId' => Yii::t('app', 'Product Name'),
            'price' => Yii::t('app', 'Price (USD)'),
            'startDate' => Yii::t('app', 'Start Date'),
            'endDate' => Yii::t('app', 'End Date'),
            'myStartDate' => Yii::t('app', 'Start Date'),
            'myEndDate' => Yii::t('app', 'End Date'),
            'recordBy' => Yii::t('app', 'Record By'),
            'recordDate' => Yii::t('app', 'Record Date'),
            'updatedBy' => Yii::t('app', 'Updated By'),
            'updateDate' => Yii::t('app', 'Update Date'),
        ];
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['priceListId' => 'id']);
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(ProductItem::class, ['id' => 'productId']);
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
    
    public function getFullProductName()
    {
        return $this->product->productType->productTypeName.': ' .$this->product->productName;
    }
}
