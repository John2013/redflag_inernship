<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 13.07.2018
 * Time: 11:26
 */

class TopicsAnswer
{
	public $id, $author, $text, $created_at, $topic_id;

	const TABLE_NAME = 'topics_answers';
	const PARENT_TABLE_NAME = 'topics_answers';

	function __construct($author, $text, $topic_id, $id = null, $created_at = null)
	{
		$this->id = $id;
		$this->created_at = $created_at ?: time();
		$this->author = $author;
		$this->text = $text;
		$this->topic_id = $topic_id;
	}

	function __toString()
	{
		return $this->text;
	}

	function get_date($format = 'd.m.Y H:i:s')
	{
		return date($format, $this->created_at);
	}

	function create()
	{
		$query = "INSERT INTO " . self::TABLE_NAME . "(author, text, created_at, topic_id) 
VALUES ('{$this->author}','{$this->text}', {$this->created_at},{$this->topic_id}) 
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
			'text' => $this->text,
			'created_at' => $this->created_at,
			'topic_id' => $this->topic_id
		];
	}

	static function load($id = null, $page = null, $page_size = 3)
	{
		if ($id !== null) {
			$assoc_array = pg_select(DBCONN, self::TABLE_NAME, ['id' => $id])[0];

			return new self(
				$assoc_array['author'],
				$assoc_array['title'],
				$assoc_array['description'],
				$assoc_array['id'],
				$assoc_array['created_at']
			);
		} else {
			$query = "SELECT * FROM " . self::TABLE_NAME;
			if (isset($page)) {
				$query .= " LIMIT " . $page_size . " OFFSET " . $page * $page_size;
			}
			$rs = pg_query(DBCONN, $query);
			$assoc_array = pg_fetch_all($rs);
			/** @var TopicsAnswer[] $objects */
			$objects = [];
			foreach ($assoc_array as $row) {
				$objects[] = new self(
					$row['author'],
					$row['title'],
					$row['description'],
					$row['id'],
					$row['created_at']
				);
			}
			return $objects;
		}

	}

	static function get_by_topic_id($topic_id, $page = null, $page_size = 3){
		$query = "SELECT * FROM " . self::TABLE_NAME . "WHERE topic_id = " . self::PARENT_TABLE_NAME . ".id";
		if (isset($page)) {
			$query .= " LIMIT " . $page_size . " OFFSET " . $page * $page_size;
		}
		$rs = pg_query(DBCONN, $query);
		$assoc_array = pg_fetch_all($rs);
		/** @var TopicsAnswer[] $objects */
		$objects = [];
		foreach ($assoc_array as $row) {
			$objects[] = new self(
				$row['author'],
				$row['title'],
				$row['description'],
				$row['id'],
				$row['created_at']
			);
		}
		return $objects;
	}

	static function get_count($topic_id){
		$query = "SELECT COUNT(id) FROM " . self::TABLE_NAME . "WHERE topic_id = $topic_id";
		$rs = pg_query(DBCONN, $query);
		return pg_fetch_array($rs)[0];
	}
}