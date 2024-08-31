<?php

namespace app\modules\articles\controllers;

use app\modules\articles\models\Article;
use app\modules\articles\models\ArticleSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use \yii\db\Exception;
use yii\helpers\Json;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends Controller
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
     * Lists all Article models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Article model.
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
     * Creates a new Article model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $session=Yii::$app->session;
        $model = new Article();
        $model->author= Yii::$app->user->id;
        $model->published = 2;
        if ($this->request->isPost) {
            try {
                $model->load($this->request->post()) ;
                $model->publishDate=($model->published==1 && empty($model->publishDate))?date("Y-m-d H:i:s"):'';
                $model->recordBy=Yii::$app->user->id;
                $model->recordDate=date("Y-m-d H:i:s");
                $model->save();
                $session->setFlash('success','Article successfully saved');
                return $this->redirect(['index']);
            } catch(Exception $ex){
                
                    $session->setFlash('warning','unable to save article: '. $ex->getMessage());
            }
            
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Article model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->publishDate=($model->published==1 && empty($model->publishDate))?date("Y-m-d H:i:s"):$model->publishDate;
        $model->myStartDate = $model->startDate;
        $model->myEndDate = (!empty($model->endDate)?$model->endDate:'');
        if ($this->request->isPost && $model->load($this->request->post()) ) {
             
            $model->editDate = date("Y-m-d H:i:s");
            $model->editor = Yii::$app->user->id;
            $model->save();
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Article model.
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
    
    public function actionNextOrder($catid)
    {
        echo Json::encode(Yii::$app->articledisplay->nextOrder($catid));
    }

    /**
     * Finds the Article model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Article the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Article::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
