<?php

/* @var $this yii\web\View */
/* @var $model backend\models\Reservation */

$this->title = 'Изменить заказ: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="reservation-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
