<?php


/* @var $this yii\web\View */
/* @var $model backend\models\ReservationStatus */

$this->title = 'Создать статус заказа';
$this->params['breadcrumbs'][] = ['label' => 'Статусы заказа', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservation-status-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
