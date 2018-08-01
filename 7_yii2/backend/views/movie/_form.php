<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Movie */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="movie-form box box-primary">
	<?php $form = ActiveForm::begin([
		'enableClientValidation' => false,
		'options' => [
			'enctype' => 'multipart/form-data',
		],
	]); ?>
	<div class="box-body table-responsive">

		<?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

		<?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

		<?= $form->field($model, 'poster')->fileInput() ?>

	</div>
	<div class="box-footer">
		<?= Html::submitButton('Save', ['class' => 'btn btn-success btn-flat']) ?>
	</div>
	<?php ActiveForm::end(); ?>
</div>
