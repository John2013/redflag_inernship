<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 20.07.2018
 * Time: 12:31
 */

class Place extends BaseModel
{
	public $number;
	public $hall_row_id;
	public $offset;

	const TABLE_NAME = 'places';

	function __construct($fields = [])
	{
		parent::__construct($fields);
	}

	function get_hall_row()
	{
		return HallRow::load($this->hall_row_id);
	}

	function get_movie_hall()
	{
		$query = "SELECT hall.*
FROM " . MovieHall::TABLE_NAME . " hall
  LEFT JOIN " . HallRow::TABLE_NAME . " row on hall.id = row.movie_hall_id
WHERE hall.id = row.movie_hall_id and row.id = $this->id;";
		$rs = pg_query(DBCONN, $query);
		$assoc = pg_fetch_assoc($rs)[0];

		return new MovieHall($assoc);
	}

	function get_reservations()
	{
		return Reservation::load_by_condition(['place_id' => $this->id]);
	}

}