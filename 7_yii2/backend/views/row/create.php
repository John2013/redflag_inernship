<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Row */

$this->title = 'Create Row';
$this->params['breadcrumbs'][] = ['label' => 'Rows', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
