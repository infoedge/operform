<?php

namespace frontend\modules\membership\models;

use Yii;

use frontend\modules\membership\models\Interests;

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
 * @property Country $country
 * @property Industry $industry
 * @property JobTitles $jobTitle
 * @property User $recordBy0
 * @property Towns $town
 * @property User $updatedBy0
 * @property User $user
 */
class Members extends \yii\db\ActiveRecord
{
    public $theInterest;
    public $myDob;
    public $regionId;
    
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
            [['surname', 'gender', 'myDob', 'countryId','regionId','townId', 'phoneNo', 'industryId', 'jobTitleId'], 'required'],
            [['theInterest'],'required','message'=>'You must choose at least one topic of interest!'],
            [['userId', 'countryId', 'townId','regionId', 'industryId', 'jobTitleId', 'recordBy', 'updatedBy'], 'integer'],
            [['dob','myDob','recordDate', 'updateDate','theInterest'], 'safe'],
            [['surname'], 'string', 'max' => 15],
            [['otherNames'], 'string', 'max' => 30],
            [['gender'], 'string', 'max' => 2],
            [['phoneNo'], 'string', 'max' => 20],
            [['email', 'interests'], 'string', 'max' => 100],
            [['userId'], 'unique'],
            [['phoneNo'], 'unique'],
            [['phoneNo'],'match', 'pattern' => '/^([+]{1}?[0-9]{12,16})$/','message'=>'Only \'+\' sign and numbers are allowed'],
            [['phoneNo'], 'string','length'=>[12,16]],
            [['email'], 'email'],
            [['email'], 'unique'],
            [['countryId'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['countryId' => 'id']],
            [['industryId'], 'exist', 'skipOnError' => true, 'targetClass' => Industry::class, 'targetAttribute' => ['industryId' => 'id']],
            [['jobTitleId'], 'exist', 'skipOnError' => true, 'targetClass' => JobTitles::class, 'targetAttribute' => ['jobTitleId' => 'id']],
            [['recordBy'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['recordBy' => 'id']],
            [['regionId'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::class, 'targetAttribute' => ['regionId' => 'id']],
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
            'dob' => Yii::t('app', 'Date of Birth'),
            'myDob' => Yii::t('app', 'Date of Birth'),
            'countryId' => Yii::t('app', 'Country'),
            'regionId' => Yii::t('app', 'Region'),
            'townId' => Yii::t('app', 'Town'),
            'phoneNo' => Yii::t('app', 'Mobile Phone No'),
            'email' => Yii::t('app', 'E-mail'),
            'industryId' => Yii::t('app', 'Industry'),
            'jobTitleId' => Yii::t('app', 'Main Job Function'),
            'interests' => Yii::t('app', 'Interests'),
            'theInterest' => Yii::t('app', 'Interests'),
            'recordBy' => Yii::t('app', 'Record By'),
            'recordDate' => Yii::t('app', 'Record Date'),
            'updatedBy' => Yii::t('app', 'Updated By'),
            'updateDate' => Yii::t('app', 'Update Date'),
        ];
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
    
    public function getRegion()
    {
        return $this->hasOne(Regions::class, ['id' => 'regionId']);
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
    
    /**
     * 
     */
    public function populateInterests()
    {   
            $this->theInterest = explode(",",$this->interests);        
    }
    
    /**
     * 
     */
    public function aggregateInterests()
    {   
        $this->interests = empty($this->theInterest)?"":implode(",",$this->theInterest);
    }
    
    
    public function getFullMemberName()
    {
        return $this->otherNames.' '.$this->surname;
    }
    
    public function getTheRegion()
    {
        return $this->town->region->id;
    }
}
