<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 20.07.2018
 * Time: 12:31
 */

class Session extends BaseModel
{
	public $movie_id;
	public $hall_id;
	public $time;
	public $tariff_id;

	const TABLE_NAME = 'sessions';

	function __construct($fields)
	{
		parent::__construct($fields);
	}

	function get_movie()
	{
		return Movie::load($this->movie_id);
	}

	function get_hall()
	{
		return MovieHall::load($this->hall_id);
	}

	function get_tariff()
	{
		return Tariff::load($this->tariff_id);
	}

	function get_reservations()
	{
		return Reservation::load_by_condition(['session_id' => $this->id]);
	}

}