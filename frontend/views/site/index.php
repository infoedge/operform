<?php
use yii\helpers\Url;
/** @var yii\web\View $this */

$this->title = 'Home';
?>
<div class="site-index">
    <div class="p-5 mb-4 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">
            <img src="images/optimum-performance-logo-header.jpg" alt="optimum-performance-logo-header" class="img-fluid">
            <h1 class="display-4">Training and Mentorship for Growth!</h1>
            <p class="fs-5 fw-light">Welcome to Optimum Performance.</p>
            <p><a class="btn btn-lg btn-success" href="<?= Url::toRoute(['site/signup'])  ?>">Become an Optimum Performance member for FREE and navigate our world.</a></p>
        </div>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-md-4">
                <h2>Mentorship</h2>

                <p>The quickest way to achieve notable results and growth in career and business development is through mentorship. Get hooked to our team of mentors who have <i>'been here done that'</i> for themselves and would not like to see others go through the same hassles that they did  when they were stating  .</p>

                <p><a class="btn btn-outline-secondary" href="#">More on Mentorship &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Training</h2>

                <p>We provide personal development training, motivational training of students and staff in government, private institutions and common interest groups wishing to create a better synergy for common and individual growth for personal and business development.</p>

                <p><a class="btn btn-outline-secondary" href="<?= Url::toRoute(['/training/default/index']) ?>">More on Training &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Academy</h2>

                <p>Bring yourself up to date with your understanding on Foreign Exchange (Forex) trading, Crypto currencies, Entreprenuership, and more in our online Academy.</p>

                <p><a class="btn btn-outline-secondary" href="#">Join our Academy &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
