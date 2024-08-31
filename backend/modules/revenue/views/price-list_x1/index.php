<?php

use backend\modules\revenue\models\PriceList;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\PriceListSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Price Lists');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products and Revenue'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="price-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add to Price List'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'product.FullProductTypeName',
            'price',
            'startDate',
            'endDate',
            //'recordBy',
            //'recordDate',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, PriceList $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
