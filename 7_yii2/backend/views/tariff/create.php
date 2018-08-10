<?php


/* @var $this yii\web\View */
/* @var $model backend\models\Tariff */

$this->title = 'Создать тариф';
$this->params['breadcrumbs'][] = ['label' => 'Тарифы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tariff-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
