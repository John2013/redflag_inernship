<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 20.07.2018
 * Time: 12:31
 */

class MovieHall extends BaseModel
{
	public $number;

	const TABLE_NAME = 'movie_halls';

	function __construct($fields)
	{
		parent::__construct($fields);
	}

	function get_rows(){
		return HallRow::load_by_condition(['movie_hall_id' => $this->id]);
	}

	function get_sessions(){
		return Session::load_by_condition(['hall_id' => $this->id]);
	}

}