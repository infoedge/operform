<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;
use yii\captcha\Captcha;


$this->title = 'Signup';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Please fill out the following fields to signup:</p>

    <div class="row">
        
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
        <div class="col-md-4">
               <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
        </div>
    <div class="row">
            <div class="col-md-4">
                <?= $form->field($model, 'email') ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'email_repeat') ?>
            </div>
    </div>
    <div class="row">
        <div class="col-md-4">
                <?= $form->field($model, 'password')->passwordInput() ?>
            </div>
            <div class="col-md-4">    
                <?= $form->field($model, 'password_repeat')->passwordInput() ?>
            </div>
    </div><!-- comment -->
    <div class="row">
        <div class="col-md-6">
        <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                    'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                ]) ?>
        </div>
    </div>
                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
