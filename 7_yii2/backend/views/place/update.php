<?php

/* @var $this yii\web\View */
/* @var $model backend\models\Place */

$this->title = 'Изменить место: ' . $model->number;
$this->params['breadcrumbs'][] = ['label' => 'Места', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->number, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="place-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
