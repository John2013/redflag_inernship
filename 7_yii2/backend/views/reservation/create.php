<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Reservation */

$this->title = 'Создать заказ';
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservation-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
