<?php

use backend\modules\general\models\InterestGroups;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var backend\modules\general\models\InterestGroupsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Interest Groups');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'General Settings'), 'url' => ['default/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interest-groups-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Add Interest Group'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'groupName',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, InterestGroups $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 },
                 'template'=>'{update}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
