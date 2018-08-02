<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Session */
/* @var $movie app\models\Movie */

$movie = $model->getMovie()->one();
$this->title = "Изменить сеанс: $movie->title {$model->getTime()}";
$this->params['breadcrumbs'][] = ['label' => 'Сеансы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "$movie->title {$model->getTime()}", 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="session-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
