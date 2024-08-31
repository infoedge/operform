<?php

namespace frontend\modules\training\controllers;

use Yii;

use frontend\modules\training\models\AcademyOptions;

class AcademyController extends \yii\web\Controller
{
    public function actionCryptoCurrency()
    {
        Yii::setAlias('@academy', '/training/academyfiles/');
        return $this->render('crypto-currency');
    }

    public function actionForexTrading()
    {
        return $this->render('forex-trading');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
    
    public function actionJobSeeking()
    {
        $session = Yii::$app->session;
        $model = new AcademyOptions();
        $model->optn='001BeginnersGuideToNetworking';
        if ($this->request->isPost){
            $model->load($this->request->post());
            $model->optn=$model->mychoice;
            $session->setFlash('Success', 'You Have selected another');
        }
        return $this->render('job-seeking',[
            'model'=>$model,
        ]);
    }

    public function actionNetworkMarketing()
    {
        return $this->render('network-marketing');
    }

    public function actionOnlineBusiness()
    {
        return $this->render('online-business');
    }

    public function actionSocialMediaMarketing()
    {
        return $this->render('social-media-marketing');
    }

}
