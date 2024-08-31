<?php

use backend\modules\revenue\models\ExchangeRate;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var backend\modules\revenue\models\ExchangeRateSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Exchange Rates');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="exchange-rate-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Exchange Rate'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'currencyId',
            'currencySymbol',
            'rateAmt',
            'startDate',
            //'endDate',
            //'recordBy',
            //'recordDate',
            //'updatedBy',
            //'updateDate',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, ExchangeRate $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
