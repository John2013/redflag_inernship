<?php


/* @var $this yii\web\View */
/* @var $model backend\models\Format */

$this->title = Yii::t('app', 'Create Format');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Formats'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="format-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
