<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MovieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Фильмы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movie-index box box-primary">
	<?php Pjax::begin(); ?>
	<div class="box-header with-border">
		<?= Html::a('Создать фильм', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
	</div>
	<div class="box-body table-responsive no-padding">
		<?php // echo $this->render('_search', ['model' => $searchModel]); ?>
		<?= GridView::widget([
			'dataProvider' => $dataProvider,
			'filterModel' => $searchModel,
			'layout' => "{items}\n{summary}\n{pager}",
			'columns' => [
				['class' => 'yii\grid\SerialColumn'],

				'id:integer',
				'title',
//				'description:ntext',
//				[
//					'attribute' => 'poster',
//					'format' => 'image',
//					'value' => function ($model) {
//						/** @var \common\models\Movie $model */
//						return $model->getThumbFileUrl('poster', 'thumb');
//					}
//				],
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
				'created_at:datetime',
				'updated_at:datetime',

				['class' => 'yii\grid\ActionColumn'],
			],
		]); ?>
	</div>
	<?php Pjax::end(); ?>
</div>
