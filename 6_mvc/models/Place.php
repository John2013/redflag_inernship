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

	public $_row_number;
	public $_hall_number;

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

	static function get_by_hall_id(int $hall_id)
	{
		$query = "SELECT 
	pl.*, 
	r.number as row_number, 
	h.number as hall_number 
FROM 
	places pl, 
	movie_halls h, 
	hall_rows r 
WHERE 
	pl.hall_row_id = r.id 
	AND r.movie_hall_id = h.id 
	AND h.id = $hall_id 
ORDER BY 
	h.number ASC, 
	r.number ASC, 
	pl.number";

		$rs = pg_query(DBCONN, $query);

		$models = [];
		while($row = pg_fetch_assoc($rs)){
			$model = new self($row);
			$model->_row_number = $row['row_number'];
			$model->_hall_number = $row['hall_number'];

			$models[] = $model;
		}
		$halls = [];
		foreach ($models as $model){
			$halls[$model->_hall_number][$model->_row_number][$model->number] = $model;
		}

		return $halls;
	}

	function __toString()
	{
		return (string)$this->number;
	}

}