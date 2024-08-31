<?php

namespace frontend\modules\membership\models;

use yii\base\Model;
use Yii;

/**
 * Description of Dashboard
 *
 * @author apache
 */
class Dashboard extends Model {
    
    public $memberId;
    public $userId; 
    public $memberFullName;
    public $memberType;
    public $phone;
    public $email;
    public $interests;
    public $interestStr;
    public $content;
    
    
    public function init() {
        parent::init();
        $memberdetails = Yii::$app->memberdetails;
        $this->userId = Yii::$app->user->id;
        $memberIdRec = Members::find()->where(['userId'=>Yii::$app->user->id])->one();
        $this->memberId = $memberIdRec['id'];
        $this->memberFullName = $memberdetails->getItem(4);
        $this->phone = $memberdetails->getItem(10);
        $this->email = $memberdetails->getItem(9);
        $this->interests = $memberdetails->getItem(12);
        $this->interestStr = $memberdetails->getItem(13);
        $this->content = Yii::$app->articledisplay->allArticles;
    }   
}
