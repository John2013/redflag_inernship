<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Hall */

$this->title = 'Update Hall: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Halls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="hall-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
