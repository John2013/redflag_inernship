<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Row */

$this->title = 'Update Row: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Rows', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
