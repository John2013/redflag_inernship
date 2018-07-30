<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 20.07.2018
 * Time: 12:31
 */

class HallRow extends BaseModel
{
	public $number;
	public $movie_hall_id;

	const TABLE_NAME = 'hall_rows';

	function __construct($fields = [])
	{
		parent::__construct($fields);
	}

	function get_movie_hall()
	{
		return MovieHall::load($this->movie_hall_id);
	}

	function get_places()
	{
		return Place::load_by_condition(['hall_row_id' => $this->id]);
	}

	function add_place()
	{
		$places = $this->get_places();
		$places_numbers = [];
		foreach ($places as $place) {
			$places_numbers[] = $place->number;
		}
		if(empty($places_numbers))
			$max_number = 0;
		else
			$max_number = max($places_numbers);

		$new_place = new Place(['hall_row_id' => $this->id, 'number' => $max_number + 1]);
		$new_place->save();

		return $new_place;
	}

}