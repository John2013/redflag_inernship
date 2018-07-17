<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 16.07.2018
 * Time: 15:02
 */

class QuestionsVariant
{
	public $id;
	public $text;
	public $question_id;
	const TABLE_NAME = 'question_variants';

	function __construct($text, $question_id,  $id = null)
	{
		$this->text = $text;
		$this->question_id = $question_id;
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
			'question_id' => $this->question_id,
		];
	}

	function create()
	{
		$table_name = self::TABLE_NAME;
		$query = "INSERT INTO $table_name(text, question_id) 
VALUES ('{$this->text}', {$this->question_id}) 
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

	static function load($id=null, $question_id=null)
	{
		if ($id !== null){
			$assoc_array = pg_select(DBCONN, self::TABLE_NAME, ['id' => $id])[0];

			return new self($assoc_array['text'], $assoc_array['id']);
		}
		elseif($question_id !== null){
			$query = "SELECT * FROM " . self::TABLE_NAME . " WHERE question_id = $question_id";
			$rs = pg_query(DBCONN, $query);
			$assoc_array = pg_fetch_all($rs);
			/** @var self[] $objects */
			$objects = [];
			foreach ($assoc_array as $row){
				$objects[] = new self($row['text'],$question_id, $row['id']);
			}
			return $objects;
		}
		else
			return null;

	}
}