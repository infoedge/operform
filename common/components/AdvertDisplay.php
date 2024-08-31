<?php

namespace common\components;

use \yii\base\Component;
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
                ->select('adId,*,c.anticName entranceAntic, e.anticName outgoingAntic')
                ->from('ad_campaign a')
                ->leftJoin('advert d','d.id=a.adId')
                ->leftJoin('addPayType a','p.id=a.aPayTypeId')
                ->leftJoin('ad_antics c','c.id=d.entranceAnticId')
                ->leftJoin('ad_antics e','e.id=d.entranceAnticId')
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
                    $adId= $myAdIds[mt_rand(0,$qry->count())];
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
        return Html::tag("div",Html::img($arr["banner"],['class'=>'img-responsive']).HTML::tag("p",$arr["narrative"]),['class'=>'d-flex']);
    }
}
