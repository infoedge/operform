<?php

namespace frontend\modules\membership\controllers;

use frontend\modules\membership\models\Members;
use frontend\modules\membership\models\MembersSearch;
use frontend\modules\membership\models\Regions;
use frontend\modules\membership\models\Towns;
use frontend\modules\membership\models\Country;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use Yii;
use yii\db\Exception;

/**
 * MembersController implements the CRUD actions for Members model.
 */
class MembersController extends Controller
{
    public $errMsg;
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
     * Lists all Members models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new MembersSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Members model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Members model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Members();
        $model->userId = Yii::$app->user->id;
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['dashboard/index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Creates a new Members model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionRegister()
    {
        $session=Yii::$app->session;
        $model = new Members();
        $model->userId = Yii::$app->user->id;
        //$model->email = Yii::$app->memberdetails->getEmail();
        $model->email = Yii::$app->user->identity->email;
        //$model->interests = Yii::$app->useful->postpendChars('',Yii::$app->useful->extractSysConstant('interestLength'),'0');
        $model->populateInterests();
        if ($this->request->isPost) {
            $model->load($this->request->post()) ;
            $this->keepValues($model)?
                    $session->setFlash('success',"Congratulations! You have successfully signed up."):
                    $session->setFlash('warning',$this->errMsg);
            $this->redirect(['default/index']);
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Members model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->populateInterests();
        $model->regionId = $model->town->theRegion;
        if ($this->request->isPost && $model->load($this->request->post()) ) {
            $model->aggregateInterests();
            $model->updatedBy = Yii::$app->user->id;
            $model->updateDate = date("Y-m-d H:i:s");
            $model->save();
            return $this->redirect(['default/index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionChangeInterests($id)
    {
        $model = $this->findModel($id);
        $model->myDob = $model->dob;
        $model->regionId = $model->theRegion;
        $model->populateInterests();
        if ($this->request->isPost && $model->load($this->request->post()) ) {
            $model->aggregateInterests();
            $model->updatedBy = Yii::$app->user->id;
            $model->updateDate = date("Y-m-d H:i:s");
            $model->save();
            return $this->redirect(['default/index']);
        }

        return $this->render('change_interests', [
            'model' => $model,
        ]);
    }
    /**
     * Deletes an existing Members model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Members model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Members the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Members::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    public function allocateInterests(&$model)
    {
        $interestCnt = $model->interestCount();
                for ($j=1;$j<= $interestCnt;$j++){
                    substr_replace($model->interests, $model->theInterest[$j],$j );
                }
    }
    
    public function actionTownsList($id)
    {
        $townsList = Towns::find()->where(['regionId'=>$id])->orderBy('townName ASC')->all();
        echo Json::encode($townsList);
    }
    
    
    public function actionRegionsList($id)
    {
        $regionsList = Regions::find()->where(['countryId'=>$id])->orderBy('regionName ASC')->all();
        echo Json::encode($regionsList);
    }
    
    public function actionExtractDialcode($id)
    {
        $code =  Country::find()->where(['id'=>$id])->one();
        echo Json::encode('+'.$code['dialCode']);
    }
    
    public function keepValues($model)
    {
        //$session = Yii::$app->session;
        try{
                
                $model->validate() ;    
                $model->aggregateInterests();
                //$model->dob=$model->myDob;
                $model->recordBy= Yii::$app->user->id;
                $model->recordDate = date("Y-m-d H:i:s");
                $this->errMsg = "Record successfully saved";
                if($model->save()){
                    return 1;
                }else{
                    $this->errMsg = 'Could not Save details!';
                    return 0;
                }
                
            } catch (Exception $ex) {
                $this->errMsg ='Unable to save your details: '.$ex->getMessage();
                return 0;
            }
    }
}
