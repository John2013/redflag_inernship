<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReservationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservation-index box box-primary">
    <?php Pjax::begin(); ?>
    <div class="box-header with-border">
        <?= Html::a('Создать заказ', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
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
		            'label' => 'Пользователь',
		            'attribute' => 'user_nickname',
		            'value' => function ($model) {
			            return $model->user->username;
		            }
	            ],
//	            'place.row.hall.number:integer:Кинозал',
	            [
		            'label' => 'Зал',
		            'attribute' => 'hall_number',
		            'value' => function ($model) {
			            return $model->place->row->hall->number;
		            }
	            ],
//	            'place.row.number:integer:Ряд',
	            [
		            'label' => 'Ряд',
		            'attribute' => 'row_number',
		            'value' => function ($model) {
			            return $model->place->row->number;
		            }
	            ],
//	            'place.number:integer:Место',
	            [
		            'label' => 'Место',
		            'attribute' => 'place_number',
		            'value' => function ($model) {
			            return $model->place->row->number;
		            }
	            ],
//                'status.name:text:Статус',
	            [
		            'label' => 'Статус',
		            'attribute' => 'status_name',
		            'value' => function ($model) {
			            return $model->status->name;
		            }
	            ],
//	            'session.movie.title:text:Фильм',
	            [
		            'label' => 'Фильм',
		            'attribute' => 'movie_title',
		            'value' => function ($model) {
			            return $model->movie->title;
		            }
	            ],
//	            'session.time:datetime:Время',
	            [
		            'label' => 'Время',
		            'format' => 'datetime',
		            'attribute' => 'session_time',
		            'value' => function ($model) {
			            return $model->session->time;
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
