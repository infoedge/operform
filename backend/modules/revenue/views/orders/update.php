<?php

use yii\helpers\Html;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\Orders $model */

$this->title = Yii::t('app', 'Update Orders for: {name}', [
    'name' => $model->member->FullMemberName .' made on '.$model->orderDate,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products and Revenue'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'ordersId',
            'priceList.product.productName',
            'quantity',
            'totalAmt',
            //'isCancelled',
            //'cancelDate',
            //'requiresDelivery',
            //'recordBy',
            //'recordDate',
            //'updatedBy',
            //'updateDate',
            [
                'class' => ActionColumn::className(),
//                'urlCreator' => function ($action, OrderItem $model, $key, $index, $column) {
//                    return Url::toRoute([$action, 'id' => $model->id]);
//                 },
                 'template'=>'{update}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>
</div>
