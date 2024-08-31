<?php

namespace app\modules\articles\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $categoryName
 * @property int|null $parentCat
 * @property string|null $categoryDescription
 * @property int $catOrder
 * @property int|null $featured
 * @property int $recordBy
 * @property string $recordDate
 * @property int|null $updatedBy
 * @property string|null $updateDate
 *
 * @property ArticleDisplay $articleDisplay
 * @property Article[] $articles
 * @property Category[] $categories
 * @property Category $parentCat0
 * @property User $recordBy0
 * @property User $updatedBy0
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['categoryName'], 'required'],
            [['parentCat', 'catOrder', 'featured', 'recordBy', 'updatedBy'], 'integer'],
            [['categoryDescription'], 'string'],
            [['recordDate', 'updateDate'], 'safe'],
            [['categoryName'], 'string', 'max' => 40],
            [['categoryName'], 'unique'],
            [['parentCat'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['parentCat' => 'id']],
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
            'categoryName' => Yii::t('app', 'Category Name'),
            'parentCat' => Yii::t('app', 'Parent Category'),
            'categoryDescription' => Yii::t('app', 'Category Description'),
            'catOrder' => Yii::t('app', 'Category Order'),
            'featured' => Yii::t('app', 'Featured'),
            'recordBy' => Yii::t('app', 'Record By'),
            'recordDate' => Yii::t('app', 'Record Date'),
            'updatedBy' => Yii::t('app', 'Updated By'),
            'updateDate' => Yii::t('app', 'Update Date'),
        ];
    }

    /**
     * Gets query for [[ArticleDisplay]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticleDisplay()
    {
        return $this->hasOne(ArticleDisplay::class, ['catId' => 'id']);
    }

    /**
     * Gets query for [[Articles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticles()
    {
        return $this->hasMany(Article::class, ['catId' => 'id']);
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::class, ['parentCat' => 'id']);
    }

    /**
     * Gets query for [[ParentCat0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParentCat0()
    {
        return $this->hasOne(Category::class, ['id' => 'parentCat']);
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
