<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Genre;
use backend\models\MovieOption;

/* @var $this yii\web\View */
/* @var $model backend\models\Movie */
/* @var $form yii\widgets\ActiveForm */
if(!$model->isNewRecord){
	$genres = $model->getGenres()->select('id')->asArray()->all();
	$options = $model->getOptions()->select('id')->asArray()->all();

	$model->genre_ids = ArrayHelper::getColumn($genres, 'id');
	$model->option_ids = ArrayHelper::getColumn($options, 'id');
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

		<?= $form->field($model, 'genre_ids')->dropDownList(Genre::listAll(), ['multiple' => true]) ?>

		<?= $form->field($model, 'option_ids')->dropDownList(MovieOption::listAll(), ['multiple' => true]) ?>

	</div>
	<div class="box-footer">
		<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success btn-flat']) ?>
	</div>
	<?php ActiveForm::end(); ?>
</div>
