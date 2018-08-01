<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form box box-primary">
	<?php $form = ActiveForm::begin(); ?>
	<div class="box-body table-responsive">

		<?= $form->field($model, 'username')->textInput() ?>
		<?= $form->field($model, 'email')->input('email') ?>
		<?= $form->field($model, 'first_name')->textInput() ?>
		<?= $form->field($model, 'last_name')->textInput() ?>
		<?= $form->field($model, 'avatar')->fileInput() ?>

	</div>
	<div class="box-footer">
		<?= Html::submitButton('Сохранить', ['class' => 'btn btn-success btn-flat']) ?>
	</div>
	<?php ActiveForm::end(); ?>
</div>
