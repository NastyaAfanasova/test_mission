<?php

namespace app\controllers;


use app\components\ApiBaseController;
use app\models\DoctorScienceDegree;

class ApiScienceDegreeController extends ApiBaseController
{
    /** @var string */
    public $modelClass = DoctorScienceDegree::class;

    /**
     * @return array
     */
    public function actions()
    {
        $actions = parent::actions();
        $actions['options']['collectionOptions'] = ['GET', 'HEAD', 'OPTIONS'];
        $actions['options']['resourceOptions'] = ['GET', 'HEAD', 'OPTIONS'];

        return $actions;
    }
}