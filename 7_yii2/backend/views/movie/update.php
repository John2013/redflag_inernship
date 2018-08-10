<?php


/* @var $this yii\web\View */
/* @var $model backend\models\Movie */

$this->title = 'Изменить фильм: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Фильмы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="movie-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
