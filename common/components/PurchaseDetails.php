<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace common\components;

use \yii\base\Component;
use \yii\helpers\Html;
use yii\helpers\Url;

/**
 * Description of PurchaseDetails
 *
 * @author apache
 */
class PurchaseDetails extends Component{
    public function displayProduct(
            $productTypeId,
            $showType=1,/** 1= single product; 2= All products*/
            $cols=2
            )
    {
        $qry = (new \yii\db\Query())
                ->select('*, r.id as priceListId')
                ->from('price_list r')
                ->leftJoin('product_item i','i.id=r.productId')
                ->leftJoin('product_type t','i.productTypeId=t.id')
                ->leftJoin('packing_types c','i.packingId=c.id');
                
        switch($showType){
            case 1:
                $result = $qry->where(['productTypeId'=>$productTypeId])->one();
                $display='';
                if(!empty($result)){
//                
                $display .= Html::tag("div",
                            Html::tag("div", Html::img($result["tutorialFile"],['class'=>'img-responsive','width'=>'150px'])
                            ,['class'=>'col-md-6'])
                            .Html::tag("div",
                             Html::tag("h3",'Title: '. Html::tag("strong",$result["productName"])).$result["description"]
                            .'<br/> Packing: '.$result["productTypeName"].' '.$result["packTypeName"]
                            .'<br/> Price($ US):'.$result["price"]
                                ,['class'=>'col-md-6'])
                            ,['class'=>'d-flex flex-row gap-2']);
                }else{
                    $display .='No Info available.';
                }
                
                return $display;
            case 2:
                $results= $qry->where(['productTypeId'=>$productTypeId])->all();
                $display='';
                if(!empty($results)){
                    $display.=$this->showProducts($results,$display,$cols);
                }
                return $display;
            default:
                return 'Nothing to show';
        }         
    }
    
    public function showProducts($results,$display,$cols)
    {   foreach($results as $i=>$result){
                if($i%$cols==0){
                        $display .= "<div class='d-flex flex-row gap-4'>";
                } 
                $colSize= (12/$cols);
                $display .=Html::tag("div",Html::tag("div", Html::img($result["tutorialFile"],['class'=>'img-responsive','width'=>'150px'])
                                ,['class'=>'p-3'])
                                .Html::tag("div",
                                 Html::tag("h3",'Title: '. Html::tag("strong",$result["productName"])).$result["description"]
                                .Html::tag("p",' Packing: '.$result["productTypeName"].' '.$result["packTypeName"])
                                .Html::tag("p",'Price($ US):'.$result["price"])
                                .Html::a('Get a Copy', Url::to(['/purchases/order-item/sales','priceListId'=>$result["priceListId"]]) , ['class'=>'btn btn-success'])
                                    ,['class'=>'p-3']),['class'=>'d-flex flex-row gap-4 col-md-'.$colSize]);
                if($i%$cols==0){
                    $display .= "</div>";
                }
        }
        return $display;
    }
}