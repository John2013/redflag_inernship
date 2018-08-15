<?php


/* @var $this yii\web\View */
/* @var $model backend\models\MovieOption */

$this->title = 'Создать опцию';
$this->params['breadcrumbs'][] = ['label' => 'Опции', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movie-option-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
