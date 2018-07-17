<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 16.07.2018
 * Time: 17:28
 */

class UsersAnswer
{
	private
		$id,
		$question_id,
		$answer_id;

	const
		TABLE_NAME = 'users_answers',
		QUESTIONS_TABLE = 'question_variants';

	function __construct($question_id, $answer_id, $id = null)
	{
		$this->id = $id;
		$this->question_id = $question_id;
		$this->answer_id = $answer_id;
	}

	function get_assoc()
	{
		return [
			'id' => $this->id,
			'question_id' => $this->question_id,
			'answer_id' => $this->answer_id,
		];
	}

	function create()
	{
		$table_name = self::TABLE_NAME;
		$query = "INSERT INTO $table_name(question_id, variant_id) 
VALUES ($this->question_id, $this->answer_id) 
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

	static function load($question_id)
	{
		$query = "SELECT * FROM " . self::TABLE_NAME . " WHERE question_id = $question_id";
		$rs = pg_query(DBCONN, $query);
		$assoc_array = pg_fetch_all($rs);
		/** @var self[] $objects */
		$objects = [];
		foreach ($assoc_array as $row) {
			$objects[] = new self($row['text'], $row['id']);
		}
		return $objects;

	}

	static function get_count_array($question_id)
	{
		$this_table = self::TABLE_NAME;
		$variants_table = self::QUESTIONS_TABLE;
		$query = "SELECT
  v.id AS variant_id,
  v.text,
  count(a.id)::int AS count
FROM $variants_table v
LEFT JOIN $this_table a on v.id = a.variant_id
WHERE v.question_id = $question_id
GROUP BY v.id";


		$rs = pg_query(DBCONN, $query);
		$answers = pg_fetch_all($rs);
		$answers_count = array_reduce($answers, function ($count, $answer) {
			return $count + $answer['count'];
		});
		if ($answers_count == 0)
			return $answers;

		foreach ($answers as $key => $answer) {
			$answers[$key]['percent'] = round($answer['count'] / $answers_count * 100);
		}
		return $answers;
	}
}