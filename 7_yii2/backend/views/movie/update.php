<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Movie */

$this->title = 'Update Movie: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Movies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="movie-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
