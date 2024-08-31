<?php

namespace backend\modules\revenue\models;

use Yii;
use yii\helpers\Url;
use yii\web\UploadedFile;

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
    public $myFile;
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
            [['productName', 'productTypeId', 'packingId', 'version'], 'required'],
            [['productTypeId', 'packingId', 'hasExpiry', 'expiryPeriod', 'recordBy'], 'integer'],
            [['recordDate'], 'safe'],
            [['producer'], 'string', 'max' => 30],
            [['productName'], 'string', 'max' => 150],
            [['code'], 'string', 'max' => 50],
            [['version'], 'string', 'max' => 20],
            [['description','tutorialFile'], 'string', 'max' => 255],
            //[['tutorialFile'], 'file', 'skipOnEmpty' => false, 'extensions' => ['pdf','epub','jpg']],
            [['myFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf, epub, jpg'],
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
            'productTypeId' => Yii::t('app', 'Product Type'),
            'producer' => Yii::t('app', 'Author'),
            'packingId' => Yii::t('app', 'Packing Type'),
            'code' => Yii::t('app', 'ISBN Code'),
            'version' => Yii::t('app', 'Version'),
            'description' => Yii::t('app', 'Description'),
            'tutorialFile' => Yii::t('app', 'File Name'),
            'hasExpiry' => Yii::t('app', 'Has Expiry'),
            'expiryPeriod' => Yii::t('app', 'Expiry Period(Days)'),
            'recordBy' => Yii::t('app', 'Record By'),
            'recordDate' => Yii::t('app', 'Record Date'),
        ];
    }
    
     public function upload()
    {
        if ($this->validate()) {
            
            $path =substr( Url::base(),0,strlen( Url::base())-3). 'modules/revenue/assets/uploads/';
            $_FILES['ProductItem']['full_path']['myFile']= $path;
            $this->myFile->saveAs( $path. $this->myFile->baseName . '.' . $this->myFile->extension);
            return true;
        } else {
            return false;
        }
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
    
    public function getFullProductTypeName()
    {
        return $this->productName .'('.$this->productType->productTypeName .')';
    }
}
