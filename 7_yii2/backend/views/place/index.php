<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PlaceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Места';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="place-index box box-primary">
	<?php Pjax::begin(); ?>
	<div class="box-header with-border">
		<?= Html::a('Создать место', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
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
//				'row.hall.number:integer:Номер кинозала',
				[
					'label' => 'Номер зала',
					'attribute' => 'hall_number',
					'value' => function ($model) {
						return $model->hall->number;
					}
				],
				[
					'label' => 'Номер ряда',
					'attribute' => 'row_number',
					'value' => function ($model) {
						return $model->row->number;
					}
				],
				'number:integer',
				'offset',
				'created_at:datetime',
				'updated_at:datetime',

				['class' => 'yii\grid\ActionColumn'],
			],
		]); ?>
	</div>
	<?php Pjax::end(); ?>
</div>
