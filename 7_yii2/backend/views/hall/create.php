<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hall */

$this->title = 'Create Hall';
$this->params['breadcrumbs'][] = ['label' => 'Halls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hall-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
