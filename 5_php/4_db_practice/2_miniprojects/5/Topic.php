<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 13.07.2018
 * Time: 11:26
 */

class Topic
{
	public $id, $author, $title, $description, $created_at, $answers_count;

	const TABLE_NAME = 'topics';
	const CHILD_TABLE_NAME = 'topics_answers';

	function __construct($author, $title, $description, $answers_count=null, $id = null, $created_at = null)
	{
		$this->id = $id;
		$this->created_at = $created_at ?: time();
		$this->author = $author;
		$this->title = $title;
		$this->description = $description;
		$this->answers_count = $answers_count ?: TopicsAnswer::get_count($this->id);
	}

	function __toString()
	{
		return $this->description;
	}

	function get_date($format = 'd.m.Y H:i:s')
	{
		return date($format, $this->created_at);
	}

	function create()
	{
		$query = "INSERT INTO " . self::TABLE_NAME . "(author, title, description, created_at) 
VALUES ('{$this->author}','{$this->title}','{$this->description}', {$this->created_at}) 
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

	function get_assoc()
	{
		return [
			'id' => $this->id,
			'author' => $this->author,
			'title' => $this->title,
			'description' => $this->description
		];
	}

	static function load($id = null, $page = null, $page_size = 3)
	{
		if ($id !== null) {
			$table_name = self::TABLE_NAME;
			$childs_table_name = self::CHILD_TABLE_NAME;
			$query = "SELECT $table_name.*, COUNT($childs_table_name.id) as 'answers_count' 
FROM $table_name, $childs_table_name
WHERE $table_name.id = $childs_table_name.topic_id AND  $table_name.id = $id";
			$rs = pg_query(DBCONN, $query);
			$assoc_array = pg_fetch_all($rs)[0];

			return new self(
				$assoc_array['author'],
				$assoc_array['title'],
				$assoc_array['description'],
				$assoc_array['answers_count'],
				$assoc_array['id'],
				$assoc_array['created_at']
			);
		} else {
			$table_name = self::TABLE_NAME;
			$childs_table_name = self::CHILD_TABLE_NAME;
			$query = "SELECT $table_name.*, COUNT($childs_table_name.id) as 'answers_count' 
FROM $table_name, $childs_table_name
WHERE $table_name.id = $childs_table_name.topic_id";
			if (isset($page)) {
				$query .= " LIMIT " . $page_size . " OFFSET " . $page * $page_size;
			}
			$rs = pg_query(DBCONN, $query);
			$assoc_array = pg_fetch_all($rs);
			/** @var self[] $objects */
			$objects = [];
			foreach ($assoc_array as $row) {
				$objects[] = new self(
					$row['author'],
					$row['title'],
					$row['description'],
					$row['answers_count'],
					$row['id'],
					$row['created_at']
				);
			}
			return $objects;
		}

	}

	function get_answers(){
		return TopicsAnswer::get_by_topic_id($this->id);
	}

	static function get_count(){
		$query = "SELECT COUNT(id) FROM " . self::TABLE_NAME;
		$rs = pg_query(DBCONN, $query);
		return pg_fetch_array($rs)[0];
	}
}