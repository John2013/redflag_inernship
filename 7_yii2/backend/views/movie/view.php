<?php

use lesha724\youtubewidget\Youtube;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Movie */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Фильмы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movie-view box box-primary">
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
				'id:integer',
				'title',
				'description:ntext',
				[
					'label' => 'poster',
					'format' => 'image',
					'value' => function ($model) {
						/** @var backend\models\Movie $model */
						return $model->getThumbFileUrl('poster', 'thumb');
					}
				],
				[
					'label' => 'Жанры',
					'value' => function ($model) {
						/** @var backend\models\Movie $model */
						return implode(', ', $model->genres);
					}
				],
				'duration',
				'age_limit',
				[
					'label' => 'Форматы',
					'value' => function ($model) {
						/** @var $model \backend\models\Movie */
						$formatsArray = $model
							->getFormats()
							->select(['name'])
							->groupBy('name')
							->orderBy(['name' => SORT_ASC])
							->asArray()
							->all();

						$formats = \yii\helpers\ArrayHelper::getColumn($formatsArray, 'name');
						return implode(', ', $formats);
					}
				],
				[
					'label' => 'Трайлер',
					'format' => 'raw',
					'value' => function ($model) {
						return Youtube::widget(['video' => $model->trailer]);
					}
				],
				'created_at:datetime',
				'updated_at:datetime',
			],
		]) ?>
	</div>
</div>
