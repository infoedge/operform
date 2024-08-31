<?php

namespace app\modules\adverts\models;

use Yii;

/**
 * This is the model class for table "ad_antics".
 *
 * @property int $id
 * @property string|null $anticName
 *
 * @property Adverts[] $adverts
 * @property Adverts[] $adverts0
 */
class AdAntics extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ad_antics';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['anticName'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'anticName' => Yii::t('app', 'Animation Name'),
        ];
    }

    /**
     * Gets query for [[Adverts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdverts()
    {
        return $this->hasMany(Adverts::class, ['entranceAnticId' => 'id']);
    }

    /**
     * Gets query for [[Adverts0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAdverts0()
    {
        return $this->hasMany(Adverts::class, ['outAnticId' => 'id']);
    }
}
