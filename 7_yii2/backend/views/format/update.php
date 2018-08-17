<?php

/* @var $this yii\web\View */
/* @var $model backend\models\Format */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'формат',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Formats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="format-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
