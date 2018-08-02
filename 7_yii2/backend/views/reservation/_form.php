<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Reservation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reservation-form box box-primary">
    <?php $form = ActiveForm::begin(); ?>
    <div class="box-body table-responsive">

        <?= $form->field($model, 'user_id')->dropDownList(\common\models\User::listAll()) ?>

        <?= $form->field($model, 'place_id')->dropDownList(\app\models\Place::listAll()) ?>

        <?= $form->field($model, 'status_id')->dropDownList(\app\models\ReservationStatus::listAll()) ?>

        <?= $form->field($model, 'session_id')->dropDownList(\app\models\Session::listAll()) ?>

    </div>
    <div class="box-footer">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success btn-flat']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>
