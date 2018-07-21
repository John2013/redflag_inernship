<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 20.07.2018
 * Time: 12:31
 */

class Movie extends BaseModel
{
	public $name;
	public $description;
	public $poster_url;

	const TABLE_NAME = 'movies';

	function __construct($fields)
	{
		parent::__construct($fields);
	}

	function get_sessions()
	{
		return Session::load_by_condition(['movie_id' => $this->id]);
	}


}