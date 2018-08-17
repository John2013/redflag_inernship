<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model backend\models\Session */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="session-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'movie_id')->dropDownList(\backend\models\Movie::listAll()) ?>

        <?= $form->field($model, 'hall_id')->dropDownList(\backend\models\Hall::listAll()) ?>

        <?= $form->field($model, 'tariff_id')->dropDownList(\backend\models\Tariff::listAll()) ?>

        <?= $form->field($model, 'time')->widget(DateTimePicker::class, [
	        'pluginOptions' => [
		        'autoclose' => true,
		        'format' => 'mm.dd.yyyy hh:ii'
	        ]
        ]) ?>
	    
	    <?= $form->field($model, 'format_id')->dropDownList(\backend\models\Format::listAll()) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
