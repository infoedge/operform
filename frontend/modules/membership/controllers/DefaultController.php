<?php

namespace frontend\modules\membership\controllers;

use yii\web\Controller;
//use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

use frontend\modules\membership\models\Dashboard;

/**
 * Default controller for the `membership` module
 */
class DefaultController extends Controller
{
    
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $session = Yii::$app->session;
        if(Yii::$app->user->isGuest){
            $session->setFlash('Warning', 'You must login to view this page!');
            return $this->redirect(['site/login']);
        }else if(!Yii::$app->memberdetails->isMember()){
                return $this->redirect(['/membership/members/register']);
        }
        $model= new Dashboard();
        
        return $this->render('index',[
            'model'=> $model,
        ]);
    }
}
