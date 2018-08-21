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


?>
<div class="session">
	<div class="session__hall">
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
							foreach ($reservations as $reservation)
								if ($reservation->place_id == $place->id) {
									$placeReservation = $reservation;
									break;
								}


							$classStatus = "";
							if (isset($reservation))
								$classStatus = " reservation-" . $reservation->status->name;

							?>
							<div class="session__place<?= $classStatus ?>" style="margin-left:<?= $place->offset ?>rem"
							     title="<?= $place->number ?>">■
							</div>
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
