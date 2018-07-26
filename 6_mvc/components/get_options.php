<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 26.07.2018
 * Time: 14:58
 */

/**
 * @param string $col_title
 * @return false|int[][]|string[][]
 */
function get_options(string $col_title)
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
			$key = 'number';
			break;
		case "hall_id":
			$model = MovieHall::class;
			$key = 'number';
			break;
		case "tariff_id":
			$model = Tariff::class;
			$key = 'name';
			break;
		default:
			return false;
	}
	$models = $model::load();
	$options = [];
	foreach ($models as $model){
		$options[] = [
			'id' => $model->id,
			'title' => $model->$key
		];
	}
	return $options;
}