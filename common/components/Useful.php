<?php


/**
 * Description of Useful
 *
 * @author Apache1
 */
namespace common\components;

//use Yii;
use yii\base\Component;

class Useful extends Component {
    /**
     * Prepends any string with zeros until NoOfchars is reached
     * Returns string
     */
    public function x_digit($str_in, $NoOfChars){
        if (strlen(trim((string)$str_in)) < $NoOfChars){
            $str_out=  trim((string)$str_in);
            $startCnt = strlen($str_out);
            for($i=$startCnt;$i<$NoOfChars;$i++){
                $str_out='0' .$str_out;
            }
        }else{// str_in is longer than NoOfChars therefore take least significant charachters
            $str_out = substr($str_in,-$NoOfChars);
        }
        return $str_out;
    }
    
    /**
     * 
     * Ensures a string is of a predefined character length by appending 
     * character $char
     * @param type $inStr string
     * @param type $length integer
     * @param type $char string
     * @return type string
     */
    public function postpendChars($inStr,$str_length,$char)
    {
        $myLength = strlen($inStr);
        //$outStr = $inStr;
        $outStr = str_pad($inStr, $str_length - $myLength , $char );
        
        return $outStr;
    }
    
    /**
     * 
     * @param type $constantName
     * @return type Integer constantValue
     */
    public function extractSysConstant($constantName)
    {
        $quest = (new \yii\db\Query())
                ->select('*')
                ->from('sys_constants')
                ->where(['constantName'=>$constantName])
                ->one();
        return $quest['constantValue'];
    }
    
    /*
     * returns a date
     */
    public function lastMonthDate($datein /* yyyymm*/){
        $spacer='-';
        $myyear= substr($datein,0,4);
        $mymonth =substr($datein,-2);
        $myday = '01';
        $themonth=(((int)$mymonth)+1);
        //$mymonth=$this->x_digit((string)$themonth,2);
        if(($themonth)>12 ){
            $myyear=(string)(((int)$myyear)+1);
            $mymonth = "01";
        }
        $firstDateNext=$myyear.$spacer.$mymonth.$spacer.$myday;
        $mydate =  date_create($firstDateNext);
        date_modify($mydate,"-1 day");
        return (date_format($mydate,'Y-m-d'));
    }
    
    
    public function monthDate($dateIn/* assumes format yyyy/mm/dd */){
        
        return substr($dateIn,0,4). substr($dateIn,5,2);//format yyyymm
    }
    
    public function prevMonthLastDate($dateIn/* assumes format yyyymm */){
        //$thedate=date_parse($dateIn);
        $spacer='-';
        $thedate= substr($dateIn, 0,4).$spacer.substr($dateIn,5, 2).$spacer.'01';
        //$thedate= substr($dateIn, 0,4).substr($dateIn, -2).$spacer.'01';
        //$mydate= $thedate['year'].$spacer.$thedate['month'].$spacer.'01';
        /*$date = date_create('2000-01-01');
        date_add($date, date_interval_create_from_date_string('10 days'));
        echo date_format($date, 'Y-m-d');*/
        // Each set of intervals is equal.
        //$i = new DateInterval('P1D');
        //$i = DateInterval::createFromDateString('1 day');
        //$mydate =  date_create($thedate);
        $mydate =  new \DateTime($thedate);
        date_add($mydate ,date_interval_create_from_date_string('-1 day'));
        return (date_format($mydate,'Y-m-d'));
        /*$date = new \DateTime($thedate);
        $date->add(new \DateInterval('P-1D'));
        return $date->format('Y-m-d');*/
    }
    public function min($x,$y){
        return $x>$y?$y:$x;
    }
    public function max($x,$y){
        return $x<$y?$y:$x;
    }
    public function addDateInterval($theDate/* Format yyyy-mm-dd hh:ii:ss*/, $interval/* In Days*/,$outFormat=1){
        $mydate = new \DateTime($theDate);
         $mydate->modify($interval. ' days');
         switch($outFormat){
             case 1:
                 return $mydate->format('Y-m-d H:i:s');
             case 2:
                 return $mydate->format('Y-m-d');
         }
         
    }
    public function getRandomStr($length)
    {
        //$length = 10;    
        return substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,$length);
    }
    
    
    public function makePureAlphaNum($strIn)
    {
        $strout = "";
        for($i=0;$i< strlen($strIn);$i++){
            if(ctype_alnum(substr($strIn, $i,1))){
                $strout.= substr($strIn, $i,1);
            }
        }
        return $strout;
    }
    
    function force_download_a_file($dl_file)
    {
            if(is_file($dl_file))
            {
                    if(ini_get('zlib.output_compression')) { 
                                    ini_set('zlib.output_compression', 'Off');	
                    }
                    header('Expires: 0');
                    header('Pragma: public'); 
                    header('Cache-Control: private',false);
                    header('Content-Type: application/force-download');
                    header('Content-Disposition: attachment; filename="'.basename($dl_file).'"');
                    header('Content-Transfer-Encoding: binary');
                    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                    header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($dl_file)).' GMT');
                    header('Content-Length: '.filesize($dl_file));
                    header('Connection: close');
                    readfile($dl_file);
                    die();
            }
    }
    /**
     * 
     * @param type $number
     * @return string with suffixed ordinal number 
     */
    public function ordinal($number){
        $ends = array('th','st','nd','rd','th','th','th','th','th','th');
        if ((($number %100)>=11) &&(($number %100)<=13)){
                return $number.'th';
        }else {
             return $ends[$number%10];   
        }
    }
    
    /**
     * Generates a letter code (in caps)
     * @param type $strIn
     * @return type string
     */
    public function makeStrCode($strIn,$codeLength=3){
        //$vowels = array('a','e','i','o','u','A','E','I','O','U');
        
        $strOut='';
        $wordCnt=str_word_count($strIn);
        $splitWords = str_word_count($strIn,1);
        switch($wordCnt){
            case 1:// 1 word
                //$letterCnt=strlen($splitWords[0]) ;
                if(strlen($splitWords[0])>$codeLength){
                    //take first middle and last
                    $strOut = $this->appendThreeLettersPerWord($strOut,$splitWords[0]);
                    break;
                }else if(strlen($splitWords[0])==$codeLength){
                    $strOut= $splitWords[0];
                    break;
                }else{ //word length <3
                    $strOut.=$splitWords[0];
                    $strOut= $this->completeCode($strOut,$codeLength);
                    break;
                }
            case 2: //2 words
                $strOut.=substr($splitWords[0],0,1);
                $strOut.=substr($splitWords[1],0,1);
                $strOut.=substr($splitWords[1],-1,1);
                $strOut= $this->completeCode($strOut,$codeLength);
                break;
            case 3: //3 words
                
            default:// any other number of words
               $strOut= $this->appendLetters($strOut,$splitWords,$codeLength);
        }
        return strtoupper($strOut);
    }
    
    /**
     * To be used in makeStringCode
     * @param type $strOut
     * @param type $codeLength
     * @return string
     */
    protected function completeCode($strOut,$codeLength){
        $extraLetters = array('Z','X','Q','J');
        $j=0;
        while(strlen($strOut)<$codeLength){
            $strOut.=$extraLetters[$j++];
            if ($j==count($extraLetters)){
                $j=0;
            }
        }
        return $strOut;
    }
    
    protected function appendLetters($strOut,$splitWords,$codeLength){
        $wordCnt = count($splitWords);
        $numLettersPerWord= (int)($wordCnt/$codeLength);
               $remainder= $wordCnt%$codeLength;
               if ($numLettersPerWord==1 && $remainder>0){
                   for($i=0;$i<$wordCnt;$i++){
                       $strOut.=substr($splitWords[$i],0,1);
                   }
                   $strOut.=substr($splitWords[$i],-1,1);
               }else if($numLettersPerWord==1 && $remainder==0){
                   for($i=0;$i<$wordCnt;$i++){
                       $strOut.=substr($splitWords[$i],0,1);
                   }
               } else if($numLettersPerWord==2) { //words are less than chars requried
                   for($i=0;$i<$wordCnt;$i++){
                        $strOut = $this->appendTwoLettersPerWord($strOut, $splitWords[$i]);
                   }
               }
               return $strOut;
    }
    /**
     * To be used in makeStringCode
     * @param type $strOut
     * @param type $word
     * @return type
     */
    protected function appendThreeLettersPerWord($strOut,$word){
        $letterCnt= strlen($word);
        $strOut.=substr($word,0,1);
        $middle = (int)($letterCnt/2); 
        $strOut.=substr($word,$middle-1,1);
        $strOut.=substr($word,-1,1);
        return $strOut;
    }
    
    /**
     * To be used in makeStringCode
     * @param type $strOut
     * @param type $word
     * @return type
     */
    protected function appendTwoLettersPerWord($strOut,$word){
        $letterCnt= strlen($word);
        if($letterCnt>=2){
            $strOut.=substr($word,0,1);
            $strOut.=substr($word,-1,1);
        }else{
            $strOut.=substr($word,0,1);
            $strOut = $this->completeCode($strOut, 1);
        }
        return $strOut;
    }
}
