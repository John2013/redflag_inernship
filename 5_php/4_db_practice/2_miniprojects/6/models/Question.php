<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 16.07.2018
 * Time: 15:02
 */

class Question
{
	public $id;
	public $text;
	const TABLE_NAME = 'questions';

	function __construct($text, $id = null)
	{
		$this->text = $text;
		$this->id = $id;
	}

	function __toString()
	{
		return (string)$this->text;
	}

	function get_assoc()
	{
		return [
			'id' => $this->id,
			'text' => $this->text,
		];
	}

	function create()
	{
		$table_name = self::TABLE_NAME;
		$query = "INSERT INTO $table_name(text) 
VALUES ('{$this->text}') 
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

	static function load($id=null, $page=null, $page_size=3)
	{
		if ($id !== null){
			$assoc_array = pg_select(DBCONN, self::TABLE_NAME, ['id' => $id])[0];

			return new self($assoc_array['text'], $assoc_array['id']);
		}
		else{
			$query = "SELECT * FROM " . self::TABLE_NAME;
			if(isset($page)){
				$query .= " LIMIT " . $page_size . " OFFSET " . $page * $page_size;
			}
			$rs = pg_query(DBCONN, $query);
			$assoc_array = pg_fetch_all($rs);
			$objects = [];
			foreach ($assoc_array as $row){
				$objects[] = new self($row['text'], $row['id']);
			}
			return $objects;
		}

	}

	static function get_count(){
		$query = "SELECT COUNT(id) FROM " . self::TABLE_NAME;
		$rs = pg_query(DBCONN, $query);
		return pg_fetch_array($rs)[0];
	}

	function get_variants(){
		return QuestionsVariant::load(null, $this->id);
	}
}