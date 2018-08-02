<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ReservationStatus */

$this->title = 'Изменить статус заказа: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Статусы заказа', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="reservation-status-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
