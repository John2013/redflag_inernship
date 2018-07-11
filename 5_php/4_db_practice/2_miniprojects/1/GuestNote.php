<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 11.07.2018
 * Time: 11:04
 */

class GuestNote
{
	public $id;
	public $guest_name;
	public $text;
	public $time;
	const TABLE_NAME = 'guests_notes';

	function __construct($guest_name, $text, $time = null, $id = null)
	{
		$this->guest_name = $guest_name;
		$this->text = $text;
		$this->time = $time ?: time();
		$this->id = $id;
	}

	function __toString()
	{
		return $this->text;
	}

	function get_time()
	{
		return date('d.m.Y H:i:s', $this->time);
	}

	function get_assoc()
	{
		return [
			'id' => $this->id,
			'created_at' => $this->time,
			'text' => $this->text,
			'name' => $this->guest_name
		];
	}

	function create()
	{
		$query = "INSERT INTO guests_notes(name,text,created_at) 
VALUES ('{$this->guest_name}','{$this->text}',{$this->time}) 
RETURNING id";
		$rs = pg_query(DBCONN, $query);
		$this->id = pg_fetch_array($rs)[0];
		return $this->id;
	}

	function update()
	{
		$data = $this->get_assoc();
		$condition = ['id' => $this->id];

		return pg_update(DBCONN, self::TABLE_NAME, $data, $condition);
	}

	function save()
	{
		return isset($this->id) ? $this->update() : $this->create();
	}

	static function load($id=null)
	{
		if (isset($id)){
			$assoc_array = pg_select(DBCONN, self::TABLE_NAME, ['id' => $id])[0];

			return new self($assoc_array['name'], $assoc_array['text'], $assoc_array['created_at'], $assoc_array['id']);
		}
		else{
			$query = "SELECT * FROM " . self::TABLE_NAME;
			$rs = pg_query(DBCONN, $query);
			$assoc_array = pg_fetch_all($rs, PGSQL_ASSOC);
			$objects = [];
			foreach ($assoc_array as $row){
				$objects[] = new self($row['name'], $row['text'], $row['created_at'], $row['id']);
			}
			return $objects;
		}

	}
}