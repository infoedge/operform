<?php

namespace backend\modules\revenue\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string|null $password_reset_token
 * @property string $email
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property string|null $verification_token
 *
 * @property DiscountTypes[] $discountTypes
 * @property ExchangeRate[] $exchangeRates
 * @property ExchangeRate[] $exchangeRates0
 * @property Interests[] $interests
 * @property Invoices[] $invoices
 * @property Members[] $members
 * @property Members[] $members0
 * @property Members $members1
 * @property OrderItem[] $orderItems
 * @property OrderItem[] $orderItems0
 * @property Orders[] $orders
 * @property Payments[] $payments
 * @property Payments[] $payments0
 * @property PriceList[] $priceLists
 * @property ProductItem[] $productItems
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'auth_key' => Yii::t('app', 'Auth Key'),
            'password_hash' => Yii::t('app', 'Password Hash'),
            'password_reset_token' => Yii::t('app', 'Password Reset Token'),
            'email' => Yii::t('app', 'Email'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'verification_token' => Yii::t('app', 'Verification Token'),
        ];
    }

    /**
     * Gets query for [[DiscountTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiscountTypes()
    {
        return $this->hasMany(DiscountTypes::class, ['recordBy' => 'id']);
    }

    /**
     * Gets query for [[ExchangeRates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExchangeRates()
    {
        return $this->hasMany(ExchangeRate::class, ['recordBy' => 'id']);
    }

    /**
     * Gets query for [[ExchangeRates0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getExchangeRates0()
    {
        return $this->hasMany(ExchangeRate::class, ['updatedBy' => 'id']);
    }

    /**
     * Gets query for [[Interests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInterests()
    {
        return $this->hasMany(Interests::class, ['recordBy' => 'id']);
    }

    /**
     * Gets query for [[Invoices]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoices::class, ['recordBy' => 'id']);
    }

    /**
     * Gets query for [[Members]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMembers()
    {
        return $this->hasMany(Members::class, ['recordBy' => 'id']);
    }

    /**
     * Gets query for [[Members0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMembers0()
    {
        return $this->hasMany(Members::class, ['updatedBy' => 'id']);
    }

    /**
     * Gets query for [[Members1]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMembers1()
    {
        return $this->hasOne(Members::class, ['userId' => 'id']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['recordBy' => 'id']);
    }

    /**
     * Gets query for [[OrderItems0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems0()
    {
        return $this->hasMany(OrderItem::class, ['updatedBy' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['recordBy' => 'id']);
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::class, ['recordBy' => 'id']);
    }

    /**
     * Gets query for [[Payments0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments0()
    {
        return $this->hasMany(Payments::class, ['updatedBy' => 'id']);
    }

    /**
     * Gets query for [[PriceLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPriceLists()
    {
        return $this->hasMany(PriceList::class, ['recordBy' => 'id']);
    }

    /**
     * Gets query for [[ProductItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductItems()
    {
        return $this->hasMany(ProductItem::class, ['recordBy' => 'id']);
    }
}
