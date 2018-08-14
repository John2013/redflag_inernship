<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Row */

$hall = $model->getHall()->one();
$this->title = "{$hall->number}-{$model->number}";
$this->params['breadcrumbs'][] = ['label' => 'Ряды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row-view box box-primary">
	<div class="box-header">
		<?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
		<?= Html::a('Удалить', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger btn-flat',
			'data' => [
				'confirm' => 'Вы уверены?',
				'method' => 'post',
			],
		]) ?>
	</div>
	<div class="box-body table-responsive no-padding">
		<?= DetailView::widget([
			'model' => $model,
			'attributes' => [
				'id',
				'hall.number',
				'number',
				'created_at:datetime',
				'updated_at:datetime',
			],
		]) ?>
	</div>
</div>