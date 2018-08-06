<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Place */
/* @var $form yii\widgets\ActiveForm */
if($model->isNewRecord){
	$model->offset = 0;
}
?>

<div class="place-form box box-primary">
	<?php $form = ActiveForm::begin(); ?>
	<div class="box-body table-responsive">

		<?= $form->field($model, 'row_id')->dropDownList(\app\models\Row::listAll()) ?>

		<?= $form->field($model, 'number')->input('number') ?>

		<?= $form->field($model, 'offset')->input('number', ['min' => 0, 'step' => '.5']) ?>

	</div>
	<div class="box-footer">
		<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success btn-flat']) ?>
	</div>
	<?php ActiveForm::end(); ?>
</div>
