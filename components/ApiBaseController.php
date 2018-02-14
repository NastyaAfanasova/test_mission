<?php

namespace app\components;

use yii\rest\ActiveController;

class ApiBaseController extends ActiveController
{
    /**
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['languages'] = ['ru', 'en'];

        return $behaviors;
    }
}