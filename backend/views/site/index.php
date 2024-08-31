<?php
use yii\helpers\Url;
/** @var yii\web\View $this */

$this->title = 'Optimum Performance - Administration';


?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <!--<h1 class="display-4">Congratulations!</h1>-->

        <p class="lead">Welcome to Backend Admin</p>
<div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
</div> 
</div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>General Settings</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-lg btn-success" href="<?= Url::toRoute(['general/default/index']) ?>">General Settings &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Products and Revenue</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-lg btn-warning" href="<?= Url::toRoute(['revenue/default/index']) ?>">Products and Revenue &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Articles</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-lg btn-primary btn-block" href="<?= Url::toRoute(['articles/default/index']) ?>">Articles &raquo;</a></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h2>Adverts</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
                <p><a class="btn btn-lg btn-primary btn-block" href="<?= Url::toRoute(['adverts/default/index']) ?>">Adverts &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                
            </div>
            <div class="col-lg-4">
                
            </div>
        </div>

    </div>
</div>
