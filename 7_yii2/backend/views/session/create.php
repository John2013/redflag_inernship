<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Session */

$this->title = 'Create Session';
$this->params['breadcrumbs'][] = ['label' => 'Sessions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="session-create">

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
