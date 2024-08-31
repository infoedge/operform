<?php

namespace frontend\modules\books\controllers;

class BrowseController extends \yii\web\Controller
{
    public function actionEbooks()
    {
        return $this->render('ebooks');
    }

    public function actionHardCopy()
    {
        return $this->render('hard-copy');
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}
