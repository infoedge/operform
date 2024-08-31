<?php

namespace backend\modules\revenue\controllers;

use backend\modules\revenue\models\ProductItem;
use backend\modules\revenue\models\ProductItemSearch;
use app\models\UploadForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

/**
 * ProductItemController implements the CRUD actions for ProductItem model.
 */
class ProductItemController extends Controller
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
     * Lists all ProductItem models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductItemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductItem model.
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
     * Creates a new ProductItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {   //putenv('TMPDIR=/operform/backend/web/tmp');
        $session= Yii::$app->session;
        $model = new ProductItem();
        $filemodel= new UploadForm();
        
        if ($this->request->isPost) {
            $filemodel->imageFile = UploadedFile::getInstance($filemodel, 'imageFile');
            if ($model->load($this->request->post())&& $filemodel->load($this->request->post()) ) {
//                $filemodel->myFile = UploadedFile::getInstance($model, 'myFile');
//                if(!empty($model->myFile)){
                ($filemodel->upload())? 
                    $session->setFlash('success', 'File successfully uploaded'):
                    $session->setFlash('warning','File NOT uploaded');
                
                $model->recordBy=Yii::$app->user->id;
                $model->recordDate= date("Y-m-d H:i:s");
                $model->save();
                $session->addFlash('success', 'Data saved');
                return $this->redirect(['index']);
            }else{
                $session->setFlash('warning','Produt Item NoT saved and File NOT uploaded');
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'filemodel'=> $filemodel,
        ]);
    }

    /**
     * Updates an existing ProductItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ProductItem model.
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
     * Finds the ProductItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return ProductItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProductItem::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
