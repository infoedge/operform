<?php

namespace backend\modules\revenue\models;

use Yii;

/**
 * This is the model class for table "discount_types".
 *
 * @property int $id
 * @property string $discountTypeName
 * @property float $discountAmtPC
 * @property int $recordBy
 * @property string $recordDate
 *
 * @property Invoices[] $invoices
 * @property User $recordBy0
 */
class DiscountTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'discount_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['discountTypeName', 'recordBy'], 'required'],
            [['discountAmtPC'], 'number'],
            [['recordBy'], 'integer'],
            [['recordDate'], 'safe'],
            [['discountTypeName'], 'string', 'max' => 30],
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
            'discountTypeName' => Yii::t('app', 'Discount Type Name'),
            'discountAmtPC' => Yii::t('app', 'Discount Amt Pc'),
            'recordBy' => Yii::t('app', 'Record By'),
            'recordDate' => Yii::t('app', 'Record Date'),
        ];
    }

    /**
     * Gets query for [[Invoices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoices::class, ['discountType' => 'id']);
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
