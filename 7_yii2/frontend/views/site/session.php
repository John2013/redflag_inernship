<?php

/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 21.08.2018
 * Time: 16:58
 */

/* @var $this \yii\web\View */
/* @var $session \backend\models\Session */
/* @var $reservations \backend\models\Reservation[] */

$this->title = $session->movie->title . " | " . date("d.m.Y H:i", strtotime($session->time));
$this->params['breadcrumbs'][] =
	['label' => $session->movie->title, 'url' => ['site/movie', 'id' => $session->movie->id]];
$this->params['breadcrumbs'][] =
	['label' => 'Сеансы', 'url' => ['site/movie-sessions', 'movie_id' => $session->movie->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="session" id="session" data-id="<?= $session->id ?>">
	<div class="session__hall" id="hall" data-id="<?= $session->hall->id ?>">
		<h2 class="session__hall-number">Зал <?= $session->hall->number ?></h2>
		<div class="session__rows-outer">
			<div class="session__rows">
				<?
				/** @var \backend\models\Row $row */
				foreach ($session->hall->getRows()->orderBy(['number' => SORT_ASC])->with('places')->all() as $row) {
					?>
					<div class="session__row" data-id="<?= $row->id ?>">
						<div class="session__row-number"><?= $row->number ?></div>
						<div class="session__places">
							<?
							$reservedPlaceIds = \yii\helpers\ArrayHelper::getColumn(
								$session
									->getReservedPlaces()
									->select(['place.id'])
									->asArray()
									->all(),
								'id'
							);

							/** @var \backend\models\Place $place */
							foreach ($row->getPlaces()->orderBy(['number' => SORT_ASC])->all() as $place) {
								$placeReservation = null;

								$classStatus = "";

								foreach ($reservedPlaceIds as $reservedPlaceId) {
									if (in_array($place->id, $reservedPlaceIds)) {
										$classStatus = " checked";
										break;
									}
								}

								?>
								<span class="session__place<?= $classStatus ?>" id="place-<?= $place->id ?>"
								      style="margin-left:<?=
								      $place->offset * 2 ?>rem"><?= $place->number ?></span>
								<?
							}
							?>
						</div>
					</div>
					<?
				}
				?>

			</div>
		</div>

	</div>

	<div class="session__info">
		<table class="session__table">
			<tr>
				<th>Цена за место</th>
				<td><?= $session->tariff->price ?> ₽</td>
			</tr>
			<tr>
				<th>Дата и время</th>
				<td><?= date("d.m.Y H:i", strtotime($session->time)) ?></td>
			</tr>
			<tr>
				<th>Выбранные места</th>
				<td></td>
			</tr>
		</table>
	</div>
</div>