<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SessionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Сеансы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="session-index box box-primary">
	<?php Pjax::begin(); ?>
	<div class="box-header with-border">
		<?= Html::a('Создать сеанс', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
		<?= Html::a('Удалить устаревшие', ['delete-non-actual'], ['class' => 'btn btn-danger btn-flat']) ?>
	</div>
	<div class="box-body table-responsive no-padding">
		<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel' => $searchModel,
			'layout' => "{items}\n{summary}\n{pager}",
			'columns' => [
				['class' => 'yii\grid\SerialColumn'],

				'id',
				[
					'attribute' => 'movie_title',
					'label' => 'Фильм',
					'value' => function ($model) {
						return $model->movie->title;
					}
				],
				[
					'attribute' => 'hall_number',
					'label' => 'Зал',
					'value' => function ($model) {
						return $model->hall->number;
					}
				],
				[
					'attribute' => 'tariff_name',
					'label' => 'Тариф',
					'value' => function ($model) {
						return $model->tariff->name;
					}
				],
				'time:datetime',
				'created_at:datetime',
				'updated_at:datetime',

				['class' => 'yii\grid\ActionColumn'],
			],
		]); ?>
	</div>
	<?php Pjax::end(); ?>
</div>
