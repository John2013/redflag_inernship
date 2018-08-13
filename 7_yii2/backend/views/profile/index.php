<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Профиль';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view box box-primary">
	<div class="box-header">
		<?= Html::a('Изменить', ['change'], ['class' => 'btn btn-primary btn-flat']) ?>
		<?= Html::a('Удалить', ['delete'], [
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
				'username',
//				'auth_key',
//				'password_hash',
//				'password_reset_token',
				'email:email',
				'status',
				'is_admin:boolean',
				'created_at:datetime',
				'updated_at:datetime',
				'first_name',
				'last_name',
				[
					'attribute' => 'аватар',
					'format' => 'image',
					'value' => function ($data) {
						/* @var \common\models\User $data */
						return $data->getThumbFileUrl('avatar', 'thumb45');
					}
				],
			],
		]) ?>
	</div>
</div>


