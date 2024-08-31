<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var frontend\modules\training\models\AcademyOptions $model */
/** @var ActiveForm $form */
$this->title = Yii::t('app', 'Job Seekers Academy');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Dashbord'), 'url' => ['/membership/default/index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Academy'), 'url' => ['/training/academy/index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= Yii::t("app",$this->title) ?></h1>
<div class="training-views-academy-job-seeking">
    <h3>Current Topic: <?= $model->optn ?></h3>
    <?php $form = ActiveForm::begin(); ?>
<div class="row"><div class="col-md-12">
        <?= $form->field($model, 'optn')->hiddenInput()->label('') ?>
        <?= $form->field($model, 'mychoice')->radioList([ 
                        '001BeginnersGuideToNetworking'=>'BeginnersGuideToNetworking',
                        '002WhereAndHowDoIGetAJob'=>'Where And How Do I Get A Job',
                        '003JobSearchingSkills'=>'Job Searching Skills',
                        '004CVWriting'=> 'C.V. Writing',
                        '005CoverLetterWriting'=>'Cover Letter Writing',
                        '006RoleOfVolunteeringInJobSearch'=>'Role Of Volunteering In Job Search',
                        '007JobInterviews'=>'Job Interviews',],
                ['class'=>'list-group list-group-horizontal-md gap-4']) ?>
    
    </div>        <div class="form-group">
            <br/><?= Html::submitButton(Yii::t('app', 'Change Topc'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php
        echo \lesha724\documentviewer\ViewerJsDocumentViewer::widget([
            'url' => Url::base().'/../modules/training/academyfiles/JobSeekersAcademy/'. $model->optn .'.pdf', //url на ваш документ или http://example.com/test.odt
            
            'width'=>'100%',
            'height'=>'800px',
            'class'=>'myacademy',
            'id'=>'myacademy',
            
    ]);?>
</div>
    <?php ActiveForm::end(); ?>

</div><!-- training-views-academy-job-seeking -->
