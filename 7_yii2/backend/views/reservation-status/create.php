<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ReservationStatus */

$this->title = 'Create Reservation Status';
$this->params['breadcrumbs'][] = ['label' => 'Reservation Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservation-status-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
