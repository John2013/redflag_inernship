<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 26.07.2018
 * Time: 14:58
 */

/**
 * @param string $col_title
 * @return false|HallRow[]|Movie[]|MovieHall[]|Place[]|Reservation[]|Session[]|Tariff[]
 */
function get_options(string $col_title)
{
	/** @var HallRow|Movie|MovieHall|Place|Reservation|Session|Tariff $model */
	switch ($col_title) {
		case "movie_hall_id":
			$model = HallRow::class;
			break;
		case "hall_row_id":
			$model = HallRow::class;
			break;
		case "place_id":
			$model = Place::class;
			break;
		case "session_id":
			$model = Session::class;
			break;
		case "hall_id":
			$model = MovieHall::class;
			break;
		case "tariff_id":
			$model = Tariff::class;
			break;
		default:
			return false;
	}
	return $model::load();
}