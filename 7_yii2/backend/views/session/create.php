<?php


/* @var $this yii\web\View */
/* @var $model backend\models\Session */

$this->title = 'Создать сеанс';
$this->params['breadcrumbs'][] = ['label' => 'Сеансы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="session-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>