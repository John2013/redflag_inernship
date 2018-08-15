<?php


/* @var $this yii\web\View */
/* @var $model backend\models\Genre */

$this->title = 'Создать жанр';
$this->params['breadcrumbs'][] = ['label' => 'Жанры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="genre-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
