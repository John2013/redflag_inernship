<?php

/* @var $this yii\web\View */
/* @var $model backend\models\MovieOption */

$this->title = 'Измненить опцию: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Опции', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="movie-option-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
