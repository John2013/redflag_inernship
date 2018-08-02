<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Row */

$hall = $model->getHall();
$this->title = "Изменить ряд: $hall->number-$model->number";
$this->params['breadcrumbs'][] = ['label' => 'Ряды', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "$hall->number-$model->number", 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="row-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
