<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-sm-12 display-6">
            We are a global training and mentorship company, carrying out classroom training, workshops, seminars and leveraging the internet,through our website and the social media, to reach our targeted audience of individuals, groups, institutions and organisations, at all client ages and in all spheres of life.
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 para-border fs-5 fw-light">
            <h2>Mission</h2>
            <p class="show-lg">
                To empower people in all walks of life by continuously sharing knowledge, skills and ideas in order to help them increase their performance ability in order to achieve their worthwhile purpose through training, mentor-ship, coaching, nurturing talents, motivational talks and developing materials to help in improving performance.
            </p>
        </div>
        <div class="col-md-4 para-border fs-5 fw-light">
             <h2>Vision</h2>
            <p class="show-lg">
                To be an outstanding centre of training and mentorship to ensure we have empowered population where everyone we encounter is living, performing and working in full potential and satisfaction.
            </p>
        </div><!-- comment -->
        <div class="col-md-3 para-border fs-5 fw-light">
             <h2>Core values</h2>
            <p class="show-lg">
            <ul class="" >
                <li>Professionalism</li>
                <li>Integrity</li>
                <li>Honesty</li>
                <li>Client focused </li>
                <li>Adaptability </li>
            </ul>
            </p>
        </div>
    </div>
</div>
