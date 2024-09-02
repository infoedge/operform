<?php

namespace app\modules\purchases\controllers;

use \app\modules\purchases\models\Orders;
use app\modules\purchases\models\OrderItem;
use app\modules\purchases\models\OrderItemSearch;
//use app\modules\purchases\models\ProductItem;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrderItemController implements the CRUD actions for OrderItem model.
 */
class OrderItemController extends Controller
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
     * Lists all OrderItem models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new OrderItemSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrderItem model.
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
     * Creates a new OrderItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new OrderItem();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    
    public function actionSales($priceListId)
    {
        
        $models=[];
        $saleitems= $this->listSaleItems();
        foreach($saleitems as $i=>$item){
            $models[$i] = new OrderItem();
            $models[$i]->priceListId=$item["priceListId"];
            $models[$i]->productPrice = $item["price"];
            $models[$i]->quantity=($item["priceListId"]==$priceListId?1:0);
            $models[$i]->totalAmt= $models[$i]->productPrice * $models[$i]->quantity;
        }
        if ($this->request->isPost) {
            if (OrderItem::loadMultiple($models,$this->request->post()) && OrderItem::validateMultiple($models) ) {
                //create an order
                $this->saveOrder($models);
                return $this->redirect(['/membership/default/index']);
            }
        } 

        return $this->render('sales', [
            'models' => $models,
            'saleitems' => $saleitems,
        ]);
    }

    /**
     * Updates an existing OrderItem model.
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
     * Deletes an existing OrderItem model.
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
     * Finds the OrderItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return OrderItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = OrderItem::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    
    protected function listSaleItems()
    {
        $curdate = date("Y-m-d H:i:s");
        return (new \yii\db\Query())
                ->select('*, p.id as priceListId')
                ->from('price_list p')
                ->leftJoin('product_item i','i.id=p.productId')
                ->leftJoin('product_type t','t.id=i.productTypeId')
                ->where(['>','price',0])
                ->andWhere(['<','startDate',$curdate])
                ->andWhere(['OR',['endDate'=>null],['>','endDate',$curdate]])
                ->orderBy('productTypeId')
                ->all();
    }
    
    protected function createOrder()
    {
        $order = new Orders();
        $order->orderDate=date("Y-m-d H:i:s");
        $order->memberId = Yii::$app->user->id;
        $order->recordBy = Yii::$app->user->id;
        $order->recordDate = date("Y-m-d H:i:s");
        $order->save();
        return $order->id;
    }
    
    protected function saveOrder($models)
    {
        $grandAmt=0;
        $myOrderId=$this->createOrder();
                foreach($models as $model){
                    if($model->priceList==1){
                        $model->ordersId=$myOrderId;
                        $grandAmt+=($model->price*$model->quantity);
                        $model->recordBy = Yii::$app->user->id;
                        $model->recordDate = date("Y-m-d H:i:s");
                        $model->save();
                    }
                }
        $myorder = Orders::findOne($myOrderId);
        $myorder->orderAmt=$grandAmt;
        $myorder->save();
        return $grandAmt;
    }
}
