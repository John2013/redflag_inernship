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
	public $_hall_number;

	const TABLE_NAME = 'sessions';

	function __construct($fields = [])
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

	static function load_with_hall_number(int $id){
		$query = "SELECT s.*, h.number as hall_number FROM ". self::TABLE_NAME ." s, " . MovieHall::TABLE_NAME
			. " h WHERE s.hall_id = h.id AND s.id = $id";

		$rs = pg_query(DBCONN, $query);

		$assoc = pg_fetch_assoc($rs);

		$session = new self($assoc);
		$session->_hall_number = $assoc['hall_number'];
		return $session;
	}

}