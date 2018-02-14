<?php

namespace app\controllers;


use app\models\Request;
use yii\rest\ActiveController;

class ApiRequestController extends ActiveController
{
    /** @var string  */
    public $modelClass = Request::class;

    /** @var string  */
    public $createScenario = 'api-create';

    /**
     * @return array
     */
    public function actions()
    {
        $actions = parent::actions();
        $actions['options']['collectionOptions'] = ['POST', 'HEAD', 'OPTIONS'];
        $actions['options']['resourceOptions'] = ['POST', 'HEAD', 'OPTIONS'];

        return $actions;
    }
}