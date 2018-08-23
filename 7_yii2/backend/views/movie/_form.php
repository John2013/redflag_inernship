<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Genre;

/* @var $this yii\web\View */
/* @var $model backend\models\Movie */
/* @var $form yii\widgets\ActiveForm */
if (!$model->isNewRecord) {
} else {
	$model->duration = 120;
}
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

		<?= $form->field($model, 'duration')->input('number', ['min' => 0]) ?>

		<?= $form->field($model, 'genre_ids')->dropDownList(Genre::listAll(), ['multiple' => true]) ?>

		<?= $form->field($model, 'trailer')->textInput() ?>

	</div>
	<div class="box-footer">
		<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success btn-flat']) ?>
	</div>
	<?php ActiveForm::end(); ?>
</div>
