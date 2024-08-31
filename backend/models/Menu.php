<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $menu_id
 * @property string $menu
 * @property string|null $menu_name
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menu';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['menu'], 'required'],
            [['menu'], 'string'],
            [['menu_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'menu_id' => Yii::t('app', 'Menu ID'),
            'menu' => Yii::t('app', 'Menu'),
            'menu_name' => Yii::t('app', 'Menu Name'),
        ];
    }
}
