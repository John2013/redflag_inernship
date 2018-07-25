<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 21.07.2018
 * Time: 16:03
 */

class Reservation extends BaseModel
{
	public $place_id;
	public $session_id;
	public $status;
	public $client;

	function __construct($fields = [])
	{
		parent::__construct($fields);
	}

	function get_place()
	{
		return Place::load($this->place_id);
	}

	function get_session()
	{
		return Session::load(session_id());
	}
}