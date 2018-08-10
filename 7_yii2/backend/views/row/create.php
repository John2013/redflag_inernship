<?php


/* @var $this yii\web\View */
/* @var $model backend\models\Row */

$this->title = 'Создать ряд';
$this->params['breadcrumbs'][] = ['label' => 'Ряды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
