<?php

/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 07.08.2018
 * Time: 11:27
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this \yii\web\View */
/* @var $hall \backend\models\Hall */
/* @var $rows \backend\models\Row[] */
/* @var $places \backend\models\Place[][] */
/* @var $set_count_forms \backend\models\SetPlacesCountForm[] */
//echo \common\widgets\Pprint::widget(['data' => $hall]);
//echo \common\widgets\Pprint::widget(['data' => $rows]);
//echo \common\widgets\Pprint::widget(['data' => $places]);

$this->title = 'Зал ' . $hall->number . ': места';
$this->params['breadcrumbs'][] = ['label' => 'Кинозалы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hall-view box box-primary">
	<div class="box-header">
		<?= Html::a('Добавить ряд', ['places', 'id' => $hall->id, 'action' => 'add-row'], ['class' => 'btn btn-primary btn-flat']) ?>
		<?= Html::a('Удалить ряд', ['places', 'id' => $hall->id, 'action' => 'delete-row'], [
			'class' => 'btn btn-danger btn-flat',
			'data' => [
				'confirm' => 'Вы уверены?',
				'method' => 'post',
			],
		]) ?>
	</div>
	<div class="box-body table-responsive no-padding">
		<table class="table table-striped table-bordered detail-view">
			<thead>
			<tr>
				<th>Ряд</th>
				<th>Места</th>
				<th>Действия</th>
			</tr>
			</thead>
			<tbody>
			<?
			foreach ($rows as $row) {
				?>
				<tr>
					<th><?= $row->number ?></th>
					<td>
						<?
						foreach ($places[$row->number] as $place) {
							echo Html::a(
								'■',
								['place/view', 'id' => $place->id],
								['style' => "margin-left:{$place->offset}rem", 'title' => $place->number]
							);
						}
						?>
					</td>
					<td>
						<?
						$model = $set_count_forms[$row->number];
						?>
						<? $form = ActiveForm::begin(); ?>

						<?= $form->field($model, 'row_id')->hiddenInput()->label(false) ?>
						<?= $form
							->field($model, 'count')
							->input('number', ['min'=>0]) ?>

						<? ActiveForm::end(); ?>
					</td>
				</tr>
				<?
			}
			?>
			</tbody>
		</table>
	</div>
</div>

