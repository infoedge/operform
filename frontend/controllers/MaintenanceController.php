<?php

namespace frontend\controllers;

use Yii;

class MaintenanceController extends \yii\web\Controller
{
    public $layout = 'blank';
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionUnderConstruction()
    {
        if(empty(Yii::$app->useful->extractSysConstant("underConstruction"))){
                        
            $this->redirect(['site/index']);
        }
        return $this->render('under-construction');
    }

}
