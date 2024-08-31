<?php

namespace frontend\modules\training\controllers;

class ServicesController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionMentorship()
    {
        return $this->render('mentorship');
    }

    public function actionAtraining()
    {
        return $this->render('atraining');
    }

    public function actionCounselling()
    {
        return $this->render('counselling');
    }
}
