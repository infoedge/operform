<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

namespace common\components;

use \yii\base\Component;
use common\models\Members;
use common\models\Users;
use common\models\Interests;

use Yii;

/**
 * Description of MemberDetails
 *
 * @author apache
 */
class MemberDetails extends Component{
    public $content;
    public function isMember(){
        $aMember = false;
        //$myuser = Users::find()->where(['id' =>Yii::$app->user->id])->one();
        $myemail = Yii::$app->user->identity->email;
        if(!empty(Members::find()->where(['email'=>$myemail ])->one())){
            $aMember = true;
        }
        return $aMember;
    }
    public function getEmail()
    {
        $myuser = Users::find()->where(['id' =>Yii::$app->user->id])->one();
        return $myuser->email;
    }
    
    public function getItem($itemNo=1)
    {
        $themember = Members::find()->where(['userId' =>Yii::$app->user->id])->one();
        if(!empty($themember)){
            switch ($itemNo){
                case 1://memberId
                    return $themember['id'];
                case 2://Surname
                    return $themember['surname'];
                case 3://otherNames
                    return $themember['otherNames'];
                case 4:// memberFullName
                    return $themember['otherNames'].' '.$themember['surname'];
                case 5://gender
                   return $themember['gender'];
                case 6://birthDate
                   return $themember['dob'];
                case 7://nationality
                    return $themember['countryId'];
                case 8://nationality
                    return $themember['townId'];
                case 9://email
                    return $themember['email'];
                case 10://phone
                    return $themember['phoneNo'];
                case 11://createDate
                    return $themember['createDate'];
                case 12://interestsList
                    return $this->listInterests($themember["interests"]);
                case 13:// Interests
                    return $themember["interests"];
                default:
                    return 0;
            }
        }
    }
    
    
    public function listInterests($myInterestStr)
    {
        $interestArr = explode(",",$myInterestStr);
        $myInterests = Interests::find()->where(['id' => $interestArr])->all();
        $interestList = empty($myInterestStr)?"No Interests Indicated!":"";
        foreach($myInterests as $k=>$item){
            if($k > 0){
                $interestList .= ", ";
            }
            $interestList .= $item["interestName"];
        }
        return $interestList;
    }
    
    public function setMemDesigDiscriminator($memId,$memType)
    {
        $useful = Yii::$app->useful;
        $mydiscriminator = ($useful->x_digit($memType,2).$useful->x_digit($memId,7));
        return $mydiscriminator;
    }
    
    public function setRegistrationNo($memberType)
    {
         $useful = Yii::$app->useful;
         $theYear = date('Y');
         $cnt = $myqry = (new \yii\db\Query())
                ->select('*')
                ->from('member_designation')
                ->where(['memberTypeId' => $memberType])
                ->count();
        
        switch ($memberType){
            case 1://Artisan
                return $theYear.$useful->x_digit($cnt+1,6);
            case 2: //Foreman
                return 'F'.$theYear.$useful->x_digit($cnt+1,5);
            case 3: //Owner/Landlord
                return 'L'.$theYear.$useful->x_digit($cnt+1,5);
            Default://Unknown
                return 'U'.$theYear.$useful->x_digit($cnt+1,5);
        }
        
    }
    
    public function addMemberDesignation($regModel)
    {
        $session = Yii::$app->session;
        try{
        Yii::$app->db->createCommand()
                ->insert('member_designation', [
                    'memberId' => $regModel->id,
                    'memberTypeId'=>$regModel->memDesig,
                    'regNo'=>$this->setRegistrationNo($regModel->memDesig),
                    'discriminator'=>$this->setMemDesigDiscriminator($regModel->id, $regModel->memDesig),
                    'startDate'=>date("Y-m-d"),
                    ])->execute();
        }
        catch(\yii\db\Exception $e){
            $session->setFlash('warning', 'Unable to save Member Designation:'.$e->getMessage());
        }
    }
    
    public function currentMember($item){
        $userId=Yii::$app->user->id;
        $quest = (new \yii\db\Query())
                ->select('*,d.id as memberDesigId')
                ->from('members m')
                ->leftJoin('member_designation d','d.memberId = m.id')
                //->leftJoin('member_types t','t.id=d.memberTypeId')
                ->where(['userId'=>$userId,'endDate'=> null])
                ->one();
        switch($item){
            case 1: // Member Type
                return $quest["memberTypeId"];
            case 2: //Member Id
                return $quest["memberId"];
            case 3:// Regisration No
                return $quest["regNo"];
            case 4:
                return $quest["memberDesigId"];
        }
    }
    
    public function confirmApproved()
    {
        
        $quest = (new \yii\db\Query())
                ->select('*')
                ->from('member_approvals a')
                ->leftJoin('member_designation d','d.id=a.memberDesigId')
                ->leftJoin('members m','m.id = d.memberId')
                ->where(['userId'=>Yii::$app->user->id])
                ->andWhere(['endDate'=> Null])
                ->andWhere(['>','memberTypeId',1]);
        $theQuest = $quest->one();       
        if($this->getMyDesignation()==1){
            return 1;
        }else{
            if(!$quest->exists()) {
                $this->addMemberApproval($this->currentMember(4));
            return 0;
            }else if($theQuest['approved']==1){//query  Exists go to 

                return 1; 
            }else{//go to waiting for approval
                return 0;
            }     
            
        }
    }
    
    public function isApprovedMember()
    {
        $retValue=1;
        //$memberId = $this->getItem();
        //$memTypeId = $this->getMyDesignation();
        $memDesigId = $this->getMyDesignation(2);
        $quest = (new \yii\db\Query())
                ->select('*')
                ->from('member_approvals a')
                ->leftJoin('member_designation d','d.id=a.memberDesigId')
                ->where([
                    'memberDesigId'=> $memDesigId,
                    'approved'=>1,
                    ])
                ->andWhere(['>','memberTypeId',1])
                ->one();
        if($quest!==null){
            $retValue=1;
        }
        return $retValue;
    }
    
    public function addMemberApproval($memberDesig,$memberApprovalType=1)
    {
         
        // create an approvals record
        Yii::$app->db->createCommand()
                ->insert('member_approvals', 
                        [
                            'memberDesigId'=>$memberDesig,
                            'memberApprovalTypeId'=>$memberApprovalType,
                            
                            'recordBy'=>Yii::$app->user->id,
                            'recordDate'=>date('Y-m-s H:i:s'),
                            ])
                ->execute();
          
    }
    public function getContent()
    {
        $this->content = Yii::$app->articledisplay->allArticles;
    }
    
}
