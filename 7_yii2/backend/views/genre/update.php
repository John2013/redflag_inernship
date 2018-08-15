<?php

/* @var $this yii\web\View */
/* @var $model backend\models\Genre */

$this->title = 'Изменить жанр: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Жанры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="genre-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
