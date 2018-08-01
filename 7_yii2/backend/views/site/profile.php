<?php

/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 31.07.2018
 * Time: 16:06
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this \yii\web\View */

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
	<h1><?= Html::encode($this->title) ?></h1>

	<p>Форма изменения свойств профиля:</p>

	<div class="row">
		<div class="col-lg-5">
			<?php $form = ActiveForm::begin([
				'id' => 'form-profile',
				'enableClientValidation' => false,
				'options' => [
					'enctype' => 'multipart/form-data',
				],
			]); ?>

			<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

			<?= $form->field($model, 'email') ?>

			<?= $form->field($model, 'first_name') ?>

			<?= $form->field($model, 'last_name') ?>

			<?= $form->field($model, 'avatar')->fileInput() ?>

			<?= $form->field($model, 'password')->passwordInput() ?>

			<div class="form-group">
				<?= Html::submitButton(
					'Сохранить',
					['class' => 'btn btn-primary', 'name' => 'profile-button']
				) ?>
			</div>

			<?php ActiveForm::end(); ?>
		</div>
	</div>
</div>

