<?php

namespace backend\modules\general\models;

use Yii;

/**
 * This is the model class for table "sys_constants".
 *
 * @property int $id
 * @property string $constantName
 * @property int $constantValue
 * @property string|null $description
 */
class SysConstants extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sys_constants';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['constantName', 'constantValue'], 'required'],
            [['constantValue'], 'integer'],
            [['constantName'], 'string', 'max' => 30],
            [['description'], 'string', 'max' => 100],
            [['constantName'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'constantName' => Yii::t('app', 'Constant Name'),
            'constantValue' => Yii::t('app', 'Constant Value'),
            'description' => Yii::t('app', 'Description'),
        ];
    }
}
