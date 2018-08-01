<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Movie */

$this->title = 'Create Movie';
$this->params['breadcrumbs'][] = ['label' => 'Movies', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movie-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
