<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Reservation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Заказы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reservation-view box box-primary">
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
	            'user.username',
	            [
		            'label' => 'Места',
		            'value' => function ($model) {
			            return implode(', ', $model->places);
		            }
	            ],
	            'status.name:text:Статус',
	            'session.movie.title:text:Фильм',
	            'session.time:datetime:Время',
	            'created_at:datetime',
	            'updated_at:datetime',
            ],
        ]) ?>
    </div>
</div>
