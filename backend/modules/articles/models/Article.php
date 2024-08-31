<?php

namespace app\modules\articles\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string $articleTitle
 * @property int $catId
 * @property string|null $articleNarration
 * @property string|null $articleIntro
 * @property string|null $articleIntroImg
 * @property string $publishDate
 * @property string $startDate
 * @property string|null $endDate
 * @property int|null $author
 * @property int|null $editor
 * @property string|null $editDate
 * @property int $published
 * @property int|null $publisher
 * @property int $articleOrder
 * @property int|null $featured
 * @property int $recordBy
 * @property string $recordDate
 *
 * @property User $author0
 * @property Category $cat
 * @property User $editor0
 * @property PublishStates $published0
 * @property User $publisher0
 * @property User $recordBy0
 */
class Article extends \yii\db\ActiveRecord
{
    public $myStartDate;
    public $myEndDate;
   
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['articleTitle', 'catId', 'startDate'], 'required'],
            [['catId', 'author', 'editor', 'published', 'publisher', 'articleOrder', 'featured', 'recordBy'], 'integer'],
            [['articleNarration', 'articleIntro'], 'string'],
            [['publishDate', 'startDate', 'endDate', 'editDate', 'myStartDate', 'myEndDate','recordDate'], 'safe'],
            [['articleTitle'], 'string', 'max' => 100],
            [['articleIntroImg'], 'string', 'max' => 255],
            [['articleTitle'], 'unique'],
            [['author'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author' => 'id']],
            [['catId'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['catId' => 'id']],
            [['editor'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['editor' => 'id']],
            [['published'], 'exist', 'skipOnError' => true, 'targetClass' => PublishStates::class, 'targetAttribute' => ['published' => 'id']],
            [['publisher'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['publisher' => 'id']],
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
            'articleTitle' => Yii::t('app', 'Article Title'),
            'catId' => Yii::t('app', 'Category'),
            'articleNarration' => Yii::t('app', 'Article Narration'),
            'articleIntro' => Yii::t('app', 'Article Intro'),
            'articleIntroImg' => Yii::t('app', 'Article Intro Img'),
            'publishDate' => Yii::t('app', 'Publish Date'),
            'startDate' => Yii::t('app', 'Start Date'),
            'myStartDate' => Yii::t('app', 'Start Date'),
            'endDate' => Yii::t('app', 'End Date'),
            'myEndDate' => Yii::t('app', 'End Date'),
            'author' => Yii::t('app', 'Author'),
            'editor' => Yii::t('app', 'Editor'),
            'editDate' => Yii::t('app', 'Edit Date'),
            
            'published' => Yii::t('app', 'Published'),
            'publisher' => Yii::t('app', 'Publisher'),
            'articleOrder' => Yii::t('app', 'Article Order'),
            'featured' => Yii::t('app', 'Featured'),
            'recordBy' => Yii::t('app', 'Record By'),
            'recordDate' => Yii::t('app', 'Record Date'),
        ];
    }

    /**
     * Gets query for [[Author0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor0()
    {
        return $this->hasOne(User::class, ['id' => 'author']);
    }

    /**
     * Gets query for [[Cat]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCat()
    {
        return $this->hasOne(Category::class, ['id' => 'catId']);
    }

    /**
     * Gets query for [[Editor0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEditor0()
    {
        return $this->hasOne(User::class, ['id' => 'editor']);
    }

    /**
     * Gets query for [[Published0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPublished0()
    {
        return $this->hasOne(PublishStates::class, ['id' => 'published']);
    }

    /**
     * Gets query for [[Publisher0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPublisher0()
    {
        return $this->hasOne(User::class, ['id' => 'publisher']);
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
    
    public function getPublishToggler(){
        return $this->published==0?'No':'Yes';
    }
    
    public function getFeaturedToggler(){
        return $this->featured==0?'No':'Yes';
    }
}
