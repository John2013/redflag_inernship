<?php

/* @var $this yii\web\View */
/* @var $model backend\models\Tariff */

$this->title = 'Изменить тариф: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Тарифы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="tariff-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
