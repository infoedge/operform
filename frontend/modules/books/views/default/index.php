<?php
use yii\helpers\Url;


$this->title="Books";

?>
<div class="books-default-index">
    <h1><?= Yii::t("app",$this->title) ?></h1>
    <h3>Route: <?= Url::to('@web/books/ebooks/sample-book-WiliamKamau.pdf',true) ?></h3>
    
    <?php
        echo \lesha724\documentviewer\ViewerJsDocumentViewer::widget([
            'url' => Url::to('@web/books/ebooks/sample-book-WiliamKamau.pdf',true), //url на ваш документ или http://example.com/test.odt
            
            'width'=>'100%',
            'height'=>'100%',
            
    ]);?>
    
</div>
