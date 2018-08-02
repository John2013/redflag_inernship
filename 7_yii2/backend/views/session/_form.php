<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Session */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="session-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'movie_id')->dropDownList(\app\models\Movie::listAll()) ?>

        <?= $form->field($model, 'hall_id')->dropDownList(\app\models\Hall::listAll()) ?>

        <?= $form->field($model, 'tariff_id')->dropDownList(\app\models\Tariff::listAll()) ?>

        <?= $form->field($model, 'time')->widget(DateTimePicker::class, [
	        'pluginOptions' => [
		        'autoclose' => true,
		        'format' => 'mm.dd.yyyy hh:ii:ss'
	        ]
        ]) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
