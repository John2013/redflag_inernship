<?php


/* @var $this yii\web\View */
/* @var $model backend\models\Movie */

$this->title = 'Создать фильм';
$this->params['breadcrumbs'][] = ['label' => 'Фильмы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movie-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
