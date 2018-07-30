<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 26.07.2018
 * Time: 14:58
 */

/**
 * @param string $col_title
 * @param int $id
 * @return false|HallRow|Movie|MovieHall|Place|Reservation|Session|Tariff
 */
function get_option(string $col_title, int $id)
{
	/** @var HallRow|Movie|MovieHall|Place|Reservation|Session|Tariff $model */
	switch ($col_title) {
		case "movie_hall_id":
			$model = HallRow::class;
			$key = 'number';
			break;
		case "hall_row_id":
			$model = HallRow::class;
			$key = 'number';
			break;
		case "place_id":
			$model = Place::class;
			$key = 'number';
			break;
		case "session_id":
			$model = Session::class;
			$key = 'id';
			break;
		case "hall_id":
			$model = MovieHall::class;
			$key = 'number';
			break;
		case "tariff_id":
			$model = Tariff::class;
			$key = 'name';
			break;
		case "movie_id":
			$model = Movie::class;
			$key = 'name';
			break;
		default:
			return false;
	}

	$model = $model::load($id);

	return $model->$key;
}