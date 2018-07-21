<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 20.07.2018
 * Time: 12:31
 */

class Tariff extends BaseModel
{
	public $name;
	public $price;

	const TABLE_NAME = 'tariffs';

	function __construct($fields)
	{
		parent::__construct($fields);
	}

	function get_sessions(){
		return Session::load_by_condition(['tariff_id' => $this->id]);
	}

}