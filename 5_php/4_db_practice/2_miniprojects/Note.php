<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 11.07.2018
 * Time: 11:04
 */

class Note
{
	public $id;
	public $title;
	public $text;
	public $time;
	const TABLE_NAME = 'notes';

	function __construct($title, $text, $time = null, $id = null)
	{
		$this->title = $title;
		$this->text = $text;
		$this->time = $time ?: time();
		$this->id = $id;
	}

	function __toString()
	{
		return $this->text;
	}

	function get_time($format = 'd.m.Y H:i:s')
	{
		return date($format, $this->time);
	}

	function get_date($format = 'd.m.Y')
	{
		return date($format, $this->time);
	}

	function get_short_text($chars_count = 500)
	{
		return substr($this->text, 0, $chars_count) . '...';
	}

	function get_assoc()
	{
		return [
			'id' => $this->id,
			'created_at' => $this->time,
			'text' => $this->text,
			'title' => $this->title
		];
	}

	function create()
	{
		$table_name = self::TABLE_NAME;
		$query = "INSERT INTO $table_name(title,text,created_at) 
VALUES ('{$this->title}','{$this->text}',{$this->time}) 
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

	static function load($id = null, $page = null, $page_size = 3)
	{
		if ($id !== null) {
			$assoc_array = pg_select(DBCONN, self::TABLE_NAME, ['id' => $id])[0];

			return new self($assoc_array['title'], $assoc_array['text'], $assoc_array['created_at'], $assoc_array['id']);
		} else {
			$query = "SELECT * FROM " . self::TABLE_NAME . " ORDER BY created_at DESC";
			if (isset($page)) {
				$query .= " LIMIT " . $page_size . " OFFSET " . $page * $page_size;
			}
			$rs = pg_query(DBCONN, $query);
			$assoc_array = pg_fetch_all($rs);
			$objects = [];
			foreach ($assoc_array as $row) {
				$objects[] = new self($row['title'], $row['text'], $row['created_at'], $row['id']);
			}
			return $objects;
		}

	}

	static function get_count()
	{
		$query = "SELECT COUNT(id) FROM " . self::TABLE_NAME;
		$rs = pg_query(DBCONN, $query);
		return pg_fetch_array($rs)[0];
	}
}