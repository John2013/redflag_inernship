<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Place */

$this->title = $model->number;
$this->params['breadcrumbs'][] = ['label' => 'Места', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="place-view box box-primary">
	<div class="box-header">
		<?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-flat']) ?>
		<?= Html::a('Удалить', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger btn-flat',
			'data' => [
				'confirm' => 'Уверены?',
				'method' => 'post',
			],
		]) ?>
		<?= Html::a(
			'Кинозал',
			['hall/places', 'id' => $model->row->hall->id],
			['class' => 'btn btn-primary btn-flat']
		) ?>
	</div>
	<div class="box-body table-responsive no-padding">
		<?= DetailView::widget([
			'model' => $model,
			'attributes' => [
				'id:integer',
				'row.number:integer',
				'number:integer',
				'offset',
				'created_at:datetime',
				'updated_at:datetime',
			],
		]) ?>
	</div>
</div>
