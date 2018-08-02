<?php

use app\models\Hall;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Row */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'hall_id')->dropDownList(Hall::listAll()) ?>

        <?= $form->field($model, 'number')->textInput() ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
