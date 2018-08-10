<?php


/* @var $this yii\web\View */
/* @var $model backend\models\Hall */

$this->title = 'Изменить кинозал: ' . $model->number;
$this->params['breadcrumbs'][] = ['label' => 'Кинозалы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->number, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="hall-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
