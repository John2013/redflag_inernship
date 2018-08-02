<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tariff */

$this->title = 'Create Tariff';
$this->params['breadcrumbs'][] = ['label' => 'Tariffs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tariff-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
