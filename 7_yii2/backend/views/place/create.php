<?php


/* @var $this yii\web\View */
/* @var $model backend\models\Place */

$this->title = 'Создать место';
$this->params['breadcrumbs'][] = ['label' => 'Места', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="place-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
