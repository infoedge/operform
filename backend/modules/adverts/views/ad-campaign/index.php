<?php

use app\modules\adverts\models\AdCampaign;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\modules\adverts\models\AdCampaignSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Ad Campaigns');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Adverts'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ad-campaign-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Ad Campaign'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'ad.FullAdvertName',
            'adPayType.adPayTypeName',
            'startDate',
            'requestedBy',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, AdCampaign $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                 'template'=>'{update}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
