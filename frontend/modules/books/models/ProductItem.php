<?php

namespace app\modules\books\models;

use Yii;

/**
 * This is the model class for table "product_item".
 *
 * @property int $id
 * @property string $productName
 * @property int $productTypeId
 * @property string|null $producer
 * @property int $packingId
 * @property string|null $code
 * @property string $version
 * @property string|null $description
 * @property int $hasExpiry
 * @property string|null $tutorialFile
 * @property int $expiryPeriod
 * @property int $recordBy
 * @property string $recordDate
 *
 * @property PackingTypes $packing
 * @property PriceList[] $priceLists
 * @property ProductType $productType
 * @property User $recordBy0
 */
class ProductItem extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['productName', 'productTypeId', 'packingId', 'version', 'recordBy'], 'required'],
            [['productTypeId', 'packingId', 'hasExpiry', 'expiryPeriod', 'recordBy'], 'integer'],
            [['recordDate'], 'safe'],
            [['productName'], 'string', 'max' => 150],
            [['producer'], 'string', 'max' => 30],
            [['code'], 'string', 'max' => 50],
            [['version'], 'string', 'max' => 20],
            [['description', 'tutorialFile'], 'string', 'max' => 255],
            [['packingId'], 'exist', 'skipOnError' => true, 'targetClass' => PackingTypes::class, 'targetAttribute' => ['packingId' => 'id']],
            [['productTypeId'], 'exist', 'skipOnError' => true, 'targetClass' => ProductType::class, 'targetAttribute' => ['productTypeId' => 'id']],
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
            'productName' => Yii::t('app', 'Product Name'),
            'productTypeId' => Yii::t('app', 'Product Type ID'),
            'producer' => Yii::t('app', 'Producer'),
            'packingId' => Yii::t('app', 'Packing ID'),
            'code' => Yii::t('app', 'Code'),
            'version' => Yii::t('app', 'Version'),
            'description' => Yii::t('app', 'Description'),
            'hasExpiry' => Yii::t('app', 'Has Expiry'),
            'tutorialFile' => Yii::t('app', 'Tutorial File'),
            'expiryPeriod' => Yii::t('app', 'Expiry Period'),
            'recordBy' => Yii::t('app', 'Record By'),
            'recordDate' => Yii::t('app', 'Record Date'),
        ];
    }

    /**
     * Gets query for [[Packing]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPacking()
    {
        return $this->hasOne(PackingTypes::class, ['id' => 'packingId']);
    }

    /**
     * Gets query for [[PriceLists]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPriceLists()
    {
        return $this->hasMany(PriceList::class, ['productId' => 'id']);
    }

    /**
     * Gets query for [[ProductType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProductType()
    {
        return $this->hasOne(ProductType::class, ['id' => 'productTypeId']);
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
