<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace common\components;

use \yii\base\Component;
use \yii\helpers\Html;
use app\modules\articles\models\Article;
use app\modules\articles\models\ArticleNumbers;

/**
 * Description of ArticleDisplay
 *
 * @author apache
 */
class ArticleDisplay extends Component {
    public $featuredArticles = array();
    public $otherArticles = array();
    public $allArticles='';
    
    public function ArticleDisplay()
    {
        $this->allArticles=$this->featuredArticles();
        $qryCat= (new \yii\db\Query())
                ->select('*')
                ->from('category')
               // ->where(['catId'=>$category])
                ->all();
        foreach($qryCat as $category){
            $this->allArticles.=$this->otherArticles($category["id"]);
        }
    }
    function aggregate()
    {
        //get the number of articles using article display
    }
    
    public  function articleNos($catId, $item=1){
        $myqry = ArticleNumbers::find()->where(['catId'=>$catId])->one(); 
        if (!empty($myqry)){
            switch($item){
                case 1://number of articles to be displayed
                    $articleCnt = $myqry["leadingArticles"]+( $myqry["cols"]* $myqry["articleRows"]);
                   return $articleCnt ;
                case 2://leadingArticles
                   return $myqry['leadingArticles'] ;
                case 3://number of colums  - not in leading article
                   return $myqry['cols'] ;
                case 4:
                   return $myqry['articleRows'] ;
                default:
                    return 0;
            }
        }
    }
    /**
     * 
     * @param type $category
     * @param type $item
     * @return int
     */
    public function articleNumbers($category,$item=1)
    {
        $qry = (new \yii\db\Query())
                ->select('*')
                ->from('article_display')
                ->where(['catId'=>$category])
                ->one();
        if (!empty($qry)){
            switch($item){
                case 1://number of articles to be displayed
                    $articleCnt = $qry["leadingArticles"]+( $qry["cols"]* $qry["articleRows"]);
                   return $articleCnt ;
                case 2://leadingArticles
                   return $qry['leadingArticles'] ;
                case 3://number of colums  - not in leading article
                   return $qry['cols'] ;
                case 4:
                   return $qry['articleRows'] ;
                default:
                    return 0;
            }
        }else{
            return -1;
        }
    }
    
    public function featuredArticles()
    {
        $articleText='';
        $currentDate = date("Y-m-d");
        $qry=(new \yii\db\Query())
                ->select('*')
                ->from('article')
                ->where([
                    'featured'=>1,
                    'published'=>1,
                    ])
                ->andWhere(['<=','startDate',$currentDate])
                ->andWhere(['OR',['>','endDate',$currentDate],['endDate'=>null]]);
        $this->featuredArticles["cnt"] = $qry->count();
        $data = $qry->all();
        if(!empty($data)){
            $k=0;$rowCnt=1;
            foreach($qry->all() as $i=>$myArticle){
                $colsInthisRow= ($rowCnt==1)?$this->articleNumbers(2,2):$this->articleNumbers(2,3);
                $colsPerRow=(12/$colsInthisRow);
                $k+=1;
                if ($k ==1){$articleText.='<div class="d-flex flex-row gap-3">';}
                
                $articleText.=Html::tag("div",
                            Html::tag("h2",$myArticle["articleTitle"]).$myArticle["articleNarration"],['class'=>'col-md-'.$colsPerRow]);
                if ($k == $colsInthisRow){$articleText.='</div>'; $k=0;$rowCnt+=1;}
            }
        }else{
            $articleText.="Featured Articles not found!";
        }
        return $articleText;
    }
    
    public function otherArticles($category)
    {
        $articleText='';
        $currentDate = date("Y-m-d");
        $qry=(new \yii\db\Query())
                ->select('*')
                ->from('article')
                ->where([
                    'featured'=>0,
                    'published'=>1,
                    'catId'=>$category,
                    ])
                ->andWhere(['<=','startDate',$currentDate])
                ->andWhere(['OR',(['>','endDate',$currentDate]),(['endDate'=>null])]);
        $this->otherArticles["cnt"] = $qry->count();
            $k=0;$rowCnt=1; 
            foreach($qry->all() as $i=>$myArticle){
                
                $colsInthisRow= ($rowCnt==1)?$this->articleNumbers($category,2):$this->articleNumbers($category,3);
                $colsWidth=(12/$colsInthisRow);
                $k+=1;
                if ($k ==1){$articleText.='<div class="d-flex flex-md-row gap-3">';}
                $articleText.=Html::tag("div",
                            Html::tag("h2",$myArticle["articleTitle"]).$myArticle["articleNarration"],['class'=>'col-md-'.$colsWidth]);
                if (($k == $colsInthisRow)){$articleText.='</div>'; $k=0;$rowCnt+=1;}
            }
        return $articleText;
    }
    
    /** Reordering **/
    /**
     * 
     * @return type
     */
    public function nextOrder($catId)
    {
        $curDate = date("Y-m-d H:m:s");
        
        return Article::find()
                ->where(['endDate'=>null,'published'=>1,'catId'=>$catId])
                ->andWhere(['OR',(['endDate'=>null,]),(['>','endDate',$curDate,])])
                ->count()+1;
    }
    
    /**
     * 
     * @param type $id
     * @throws string
     */
    protected function reorderup($id,$catId)
    {
        $curDate = date("Y-m-d H:m:s");
        $statusCount = Article::find()
                ->where(['published'=>1,'catId'=>$catId])
                ->andWhere(['OR',(['endDate'=>null,]),['>','endDate',$curDate,]])
                ->count();
        if($id <= $statusCount){
            $db = Yii::$app->db;
            try {
                $db->createCommand()->update('article',[
                   'ordering' => new \yii\db\Expression('ordering+1'),
                ],
                  'ordering >= :currentInsert', 
                [
                    ':currentInsert'=> $id,
                ])->execute();
            }
            catch(Exception $e){
                 $msg = 'Unable to reorder articles: ' . $e->getMessage();
                throw $msg;

            }
        }
    }
    
    /**
     * 
     * @param type $id
     * @return int
     * @throws string
     */
    protected function reorderdown($id,$catId)
    {
        $curDate = date("Y-m-d H:m:s");
        $statusCount = Article::find()
                ->where(['published'=>1,'catId'=>$catId])
                ->andWhere(['OR',(['endDate'=>null,]),['>','endDate',$curDate,]])
                ->count();
        if($id <= $statusCount){
            $db = Yii::$app->db;
            try {
                $db->createCommand()->update('article',[
                   'ordering' => new \yii\db\Expression('ordering - 1'),
                ],
                  'ordering >= :currentInsert', 
                [
                    ':currentInsert' > $id,
                ])->execute();
            }
            catch(Exception $e){
                 $msg = 'Unable to reorder articles: ' . $e->getMessage();
                throw $msg;

            }
            return 1;//reordering successfully
        }else{
            return 0;//no reordering done
        }
    }
}
