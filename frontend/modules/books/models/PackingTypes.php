<?php

namespace app\modules\books\models;

use Yii;

/**
 * This is the model class for table "packing_types".
 *
 * @property int $id
 * @property string $packTypeName
 *
 * @property ProductItem[] $productItems
 */
class PackingTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'packing_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['packTypeName'], 'required'],
            [['packTypeName'], 'string', 'max' => 30],
            [['packTypeName'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'packTypeName' => Yii::t('app', 'Pack Type Name'),
        ];
    }

    /**
     * Gets query for [[ProductItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductItems()
    {
        return $this->hasMany(ProductItem::class, ['packingId' => 'id']);
    }
}
