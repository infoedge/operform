<?php

namespace app\modules\adverts\models;

use Yii;

/**
 * This is the model class for table "members".
 *
 * @property int $id
 * @property int $userId
 * @property string $surname
 * @property string|null $otherNames
 * @property string $gender
 * @property string $dob
 * @property int $countryId
 * @property int $townId
 * @property string $phoneNo
 * @property string $email
 * @property int $industryId
 * @property int $jobTitleId
 * @property string $interests
 * @property int $recordBy
 * @property string $recordDate
 * @property int|null $updatedBy
 * @property string|null $updateDate
 *
 * @property Advert[] $adverts
 * @property Country $country
 * @property Industry $industry
 * @property JobTitles $jobTitle
 * @property Orders[] $orders
 * @property User $recordBy0
 * @property Towns $town
 * @property User $updatedBy0
 * @property User $user
 */
class Members extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'members';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['userId', 'surname', 'gender', 'dob', 'countryId', 'townId', 'phoneNo', 'email', 'industryId', 'jobTitleId', 'interests', 'recordBy'], 'required'],
            [['userId', 'countryId', 'townId', 'industryId', 'jobTitleId', 'recordBy', 'updatedBy'], 'integer'],
            [['dob', 'recordDate', 'updateDate'], 'safe'],
            [['surname'], 'string', 'max' => 15],
            [['otherNames'], 'string', 'max' => 30],
            [['gender'], 'string', 'max' => 2],
            [['phoneNo'], 'string', 'max' => 20],
            [['email', 'interests'], 'string', 'max' => 100],
            [['userId'], 'unique'],
            [['phoneNo'], 'unique'],
            [['email'], 'unique'],
            [['countryId'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['countryId' => 'id']],
            [['industryId'], 'exist', 'skipOnError' => true, 'targetClass' => Industry::class, 'targetAttribute' => ['industryId' => 'id']],
            [['jobTitleId'], 'exist', 'skipOnError' => true, 'targetClass' => JobTitles::class, 'targetAttribute' => ['jobTitleId' => 'id']],
            [['recordBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['recordBy' => 'id']],
            [['townId'], 'exist', 'skipOnError' => true, 'targetClass' => Towns::class, 'targetAttribute' => ['townId' => 'id']],
            [['updatedBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updatedBy' => 'id']],
            [['userId'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['userId' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'userId' => Yii::t('app', 'User ID'),
            'surname' => Yii::t('app', 'Surname'),
            'otherNames' => Yii::t('app', 'Other Names'),
            'gender' => Yii::t('app', 'Gender'),
            'dob' => Yii::t('app', 'Dob'),
            'countryId' => Yii::t('app', 'Country ID'),
            'townId' => Yii::t('app', 'Town ID'),
            'phoneNo' => Yii::t('app', 'Phone No'),
            'email' => Yii::t('app', 'Email'),
            'industryId' => Yii::t('app', 'Industry ID'),
            'jobTitleId' => Yii::t('app', 'Job Title ID'),
            'interests' => Yii::t('app', 'Interests'),
            'recordBy' => Yii::t('app', 'Record By'),
            'recordDate' => Yii::t('app', 'Record Date'),
            'updatedBy' => Yii::t('app', 'Updated By'),
            'updateDate' => Yii::t('app', 'Update Date'),
        ];
    }

    /**
     * Gets query for [[Adverts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdverts()
    {
        return $this->hasMany(Advert::class, ['ownerId' => 'id']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'countryId']);
    }

    /**
     * Gets query for [[Industry]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIndustry()
    {
        return $this->hasOne(Industry::class, ['id' => 'industryId']);
    }

    /**
     * Gets query for [[JobTitle]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJobTitle()
    {
        return $this->hasOne(JobTitles::class, ['id' => 'jobTitleId']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Orders::class, ['memberId' => 'id']);
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
     * Gets query for [[Town]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTown()
    {
        return $this->hasOne(Towns::class, ['id' => 'townId']);
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

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'userId']);
    }
    
    public function getFullMemberName()
    {
        return $this->otherNames. ' '.$this->surname;
    }
}
