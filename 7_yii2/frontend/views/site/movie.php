<?php

use lesha724\youtubewidget\Youtube;

/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 16.08.2018
 * Time: 17:05
 */

/* @var $this \yii\web\View */
/* @var $movie \backend\models\Movie */
$this->title = $movie->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movie">
	<div class="movie__trailer">
		<?= Youtube::widget(['video' => $movie->trailer]) ?>
	</div>
	<div class="movie__buttons">
		<?= \yii\helpers\Html::a(
			'Сеансы',
			['site/movie-sessions', 'movie_id' => $movie->id],
			['class' => 'btn btn-primary']) ?>
	</div>
	<div class="movie__description">
		<table class="movie__description-table">
			<tr>
				<th>Жанры:</th>
				<td><?= implode(', ', $movie->genres) ?></td>
			</tr>
			<tr>
				<th>Форматы:</th>
				<td><?= implode(', ',$movie->getFormatList()) ?></td>
			</tr>
			<tr>
				<th>Описание:</th>
				<td><?= $movie->description ?></td>
			</tr>
			<tr>
				<th>Длительность:</th>
				<td><?= $movie->duration ?> мин</td>
			</tr>
			<tr>
				<th>Возрастное ограничение:</th>
				<td><?= $movie->age_limit ?>+</td>
			</tr>
		</table>


	</div>

</div>