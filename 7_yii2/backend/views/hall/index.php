<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\HallSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Кинозалы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hall-index box box-primary">
	<?php Pjax::begin(); ?>
	<div class="box-header with-border">
		<?= Html::a('Создать кинозал', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
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
				'number:integer',
				'created_at:datetime',
				'updated_at:datetime',
				[
					'format' => 'raw',
					'content' => function ($model) {
						return Html::a(
							'Места зала',
							['places', 'id' => $model->id],
							['class' => 'btn btn-primary btn-flat']
						);
					}
				],

				['class' => 'yii\grid\ActionColumn'],
			],
		]); ?>
	</div>
	<?php Pjax::end(); ?>
</div>
