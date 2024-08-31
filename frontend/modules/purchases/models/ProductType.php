<?php

namespace app\modules\purchases\models;

use Yii;

/**
 * This is the model class for table "product_type".
 *
 * @property int $id
 * @property string $productTypeName
 * @property string $productCode
 *
 * @property ProductItem[] $productItems
 */
class ProductType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productTypeName', 'productCode'], 'required'],
            [['productTypeName'], 'string', 'max' => 30],
            [['productCode'], 'string', 'max' => 5],
            [['productTypeName'], 'unique'],
            [['productCode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'productTypeName' => Yii::t('app', 'Product Type Name'),
            'productCode' => Yii::t('app', 'Product Code'),
        ];
    }

    /**
     * Gets query for [[ProductItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductItems()
    {
        return $this->hasMany(ProductItem::class, ['productTypeId' => 'id']);
    }
}
