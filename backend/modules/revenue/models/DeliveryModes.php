<?php

namespace backend\modules\revenue\models;

use Yii;

/**
 * This is the model class for table "delivery_modes".
 *
 * @property int $id
 * @property string $deliveryTypeName
 *
 * @property Orders[] $orders
 */
class DeliveryModes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'delivery_modes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['deliveryTypeName'], 'required'],
            [['deliveryTypeName'], 'string', 'max' => 30],
            [['deliveryTypeName'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'deliveryTypeName' => Yii::t('app', 'Delivery Type Name'),
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['deliveryMode' => 'id']);
    }
}
