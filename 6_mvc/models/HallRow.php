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

	function get_movie_hall(){
		return MovieHall::load($this->movie_hall_id);
	}

	function get_places(){
		return Place::load_by_condition(['hall_row_id' => $this->id]);
	}

}