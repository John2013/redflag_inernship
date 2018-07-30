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

	function __construct($fields = [])
	{
		parent::__construct($fields);
	}

	function get_rows(){
		return HallRow::load_by_condition(['movie_hall_id' => $this->id]);
	}

	function get_sessions(){
		return Session::load_by_condition(['hall_id' => $this->id]);
	}

	function add_row(){
		$rows = $this->get_rows();
		$rows_numbers = [];
		foreach ($rows as $row) {
			$rows_numbers[] = $row->number;
		}
		if(empty($rows_numbers))
			$max_number = 0;
		else
			$max_number = max($rows_numbers);

		$new_row = new HallRow(['movie_hall_id' => $this->id, 'number' => $max_number + 1]);
		$new_row->save();

		return $new_row;
	}

	function delete_row(){
		$rows = $this->get_rows();
		/**
		 * @var HallRow $max_row
		 */
		$max_row = array_reduce($rows, function ($max_row, $cur_row){
			/**
			 * @var HallRow $max_row
			 * @var HallRow $cur_row
			 */
			return $cur_row->number > $max_row->number
				? $cur_row
				: $max_row;
		});

		return $max_row::delete($max_row->id);
	}

}