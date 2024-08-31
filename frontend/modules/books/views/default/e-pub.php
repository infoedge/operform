<?php

use yii\helpers\Url;


$this->title="Books";

?>
<div class="books-default-index">
    <h1><?= Yii::t("app",$this->title) ?></h1>
    <h3>Route: <?= Url::to('@web/books/ebooks/sample-book-WiliamKamau.pdf',true) ?></h3>
    
    <h4>EPub Reader</h4>
    
    <div id="epub-reader-frame"></div>
    
</div>
