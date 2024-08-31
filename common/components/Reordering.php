<?php

namespace common\components;

use \yii\base\Component;
use Yii;


/**
 * Description of Reordering
 *
 * @author apache
 */
class Reordering extends Component {
    /**
     * 
     * @return type
     */
    public function nextOrder($modelName)
    {
        
        return $modelName::find()->where(['endDate'=>null])->count()+1;
    }
    
    /**
     * 
     * @param type $id
     * @throws string
     */
    protected function reorderup($id,&$thetable)
    {
        $statusCount = $thetable::find()->where(['endDate'=>null])->count();
        if($id <= $statusCount){
            $db = Yii::$app->db;
            try {
                $db->createCommand()->update($thetable,[
                   'ordering' => new \yii\db\Expression('ordering+1'),
                ],
                  'ordering >= :currentInsert', 
                [
                    ':currentInsert'=> $id,
                ])->execute();
            }
            catch(Exception $e){
                 $msg = 'Unable to reorder project statuses: ' . $e->getMessage();
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
    protected function reorderdown($id,&$thetable)
    {
        $statusCount = $thetable::find()->where(['endDate'=>null])->count();
        if($id <= $statusCount){
            $db = Yii::$app->db;
            try {
                $db->createCommand()->update($thetable,[
                   'ordering' => new \yii\db\Expression('ordering - 1'),
                ],
                  'ordering >= :currentInsert', 
                [
                    ':currentInsert' > $id,
                ])->execute();
            }
            catch(Exception $e){
                 $msg = 'Unable to reorder project statuses: ' . $e->getMessage();
                throw $msg;

            }
            return 1;//reordering successfully
        }else{
            return 0;//no reordering done
        }
    }
}
