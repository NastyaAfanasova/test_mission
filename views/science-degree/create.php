<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DoctorScienceDegree */

$this->title = Yii::t('app', 'Добавить');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Научная степень'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-science-degree-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
