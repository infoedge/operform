<?php

namespace common\components;

use \yii\base\Component;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * Description of AdvertDisplay
 *
 * @author apache
 */
class AdvertDisplay extends Component{
    
    public function displayAdverts($item=1)
    {
        $currentDate = date("Y-m-d");
        $qry = (new \yii\db\Query())
                ->select('*')
                ->from('ad_campaign a')
                ->leftJoin('advert d','d.id=a.adId')
                ->leftJoin('ad_pay_type p','p.id=a.adPayTypeId')
                ->leftJoin('ad_antics c','c.id=d.entranceAnticId')
                ->leftJoin('ad_antics e','e.id=d.outAnticId')
                ->where(["<=",'adStartDate',$currentDate])
                ->andWhere(['OR',['AdEndDate'=>null],['>=','AdEndDate',$currentDate]]);
         $allAds = $qry->all(); 
         if (!empty($allAds)){
             switch($item){
                case 1: //ad count
                    return $qry->count();
                case 2:
                    return $qry->column();
                case 3:
                    //pick one adId Randomly from array
                    $myAdIds= $qry->column();
                    $adCount = $qry->count()-1;
                    $adId= $myAdIds[mt_rand(0,$adCount)];
                    //select The Ad
                    $myad=$qry->andWhere(['adId'=>$adId])->one();
                    //show The Ad
                    return $this->showAd($myad);
                     
                     
                 default:
                     return -2;
             }
         }else{
             return -1;
         }
    }
    public function showAd($arr)
    {
        return Html::a(
                Html::tag("div", Html::tag("div",Html::img($arr["ibanner"],['class'=>'img-responsive','width'=>'190px']).HTML::tag("div",$arr["adNarrative"]),['class'=>'col-md-12']),['class'=>'d-flex'])
                ,Url::toRoute(['#'])
                ,['id'=>'adNo_'.$arr["adId"]]);
    }
}
