<?php

namespace backend\modules\revenue\controllers;

use yii\web\Controller;

/**
 * Default controller for the `revenue` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
