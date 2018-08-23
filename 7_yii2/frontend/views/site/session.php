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
	['label' => $session->movie->title, 'url' => ['site/movie', 'id'=> $session->movie->id]];
$this->params['breadcrumbs'][] =
	['label' => 'Сеансы', 'url' => ['site/movie-sessions', 'movie_id'=> $session->movie->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="session">
	<div class="session__hall">
		<h2 class="session__hall-number">Зал <?= $session->hall->number ?></h2>
		<div class="session__rows-outer">
			<div class="session__rows">
				<?
				/** @var \backend\models\Row $row */
				foreach ($session->hall->getRows()->orderBy(['number' => SORT_ASC])->with('places')->all() as $row) {
					?>
					<div class="session__row">
						<div class="session__row-number"><?= $row->number ?></div>
						<div class="session__places">
							<?
							/** @var \backend\models\Place $place */
							foreach ($row->getPlaces()->orderBy(['number' => SORT_ASC])->all() as $place) {
								$placeReservation = null;
								foreach ($reservations as $reservation)
									if ($reservation->place_id == $place->id) {
										$placeReservation = $reservation;
										break;
									}


								$classStatus = "";
								if (isset($placeReservation))
									$classStatus = " checked";

								?>
								<span class="session__place<?= $classStatus ?>" style="margin-left:<?=
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
				<th>Цена за место</th><td><?= $session->tariff->price ?> ₽</td>
			</tr>
			<tr>
				<th>Дата и время</th><td><?= date("d.m.Y H:i", strtotime($session->time)) ?></td>
			</tr>
			<tr>
				<th>Выбранные места</th><td></td>
			</tr>
		</table>
	</div>
</div>
