<?php
/**
 * Description of AcademyOptions
 *
 * @author apache
 */
namespace frontend\modules\training\models;

use Yii;

use yii\base\Model;

class AcademyOptions extends Model {
    public $optn;
    public $mychoice;
    
    public function rules()
    {
        return[
            [['optn'],'required'],
            [['mychoice','optn'],'string'],
        ];
    }
    
    public function attributelabels() {
        return [
            'mychoice'=> Yii::t("app",'Select Topic of Choice Here'),
            'optn' => Yii::t("app",'Option Chosen'),
        ];
    }
}
