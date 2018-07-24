<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 20.07.2018
 * Time: 13:27
 */

class BaseModel
{
	public $id;
	public $created_at;
	public $updated_at;

	const TABLE_NAME = '';

	function __construct($fields)
	{
		$this->set_by_assoc($fields);
	}

	function get_assoc()
	{
		$assoc = [];
		foreach ($this as $key => $value) {
			if (substr($key, 0, 1) == '_')
				continue;

			$assoc[$key] = $value;
		}
		return $assoc;
	}

	function set_by_assoc($assoc_array)
	{
		foreach ($this as $key => $value) {
			if (substr($key, 0, 1) == '_')
				continue;

			$this->$key = $assoc_array[$key];
		}
	}

	function before_create()
	{
		$this->created_at = time();
		$this->updated_at = time();
	}

	function before_update()
	{
		$this->updated_at = time();
	}

	function create(){
		$this->before_create();
		$result = pg_insert(DBCONN, static::TABLE_NAME, $this->get_assoc());

		$query = "SELECT * FROM " . static::TABLE_NAME . " ORDER BY id DESC LIMIT 1;";
		$rs = pg_query(DBCONN, $query);
		$assoc_array = pg_fetch_assoc($rs)[0];

		$this->set_by_assoc($assoc_array);
		return $result;
	}

	function update(){
		$this->before_update();
		$condition = ['id' => $this->id];
		return pg_update(DBCONN, static::TABLE_NAME, $this->get_assoc(), $condition);
	}

	function save(){
		return $this->id
			? $this->update()
			: $this->create();
	}

	static function load($id=null, $page=null, $page_size=null, $isAsc = true){
		if ($id !== null) {
			$assoc_array = pg_select(DBCONN, static::TABLE_NAME, ['id' => $id])[0];

			return new static($assoc_array);
		} else {
			$asc = $isAsc ? "ASC" : "DESC";
			$limit = $page? "LIMIT " . $page_size . " OFFSET " . $page * $page_size : "";

			$query = "SELECT * FROM " . static::TABLE_NAME . " ORDER BY created_at $asc $limit";
			$rs = pg_query(DBCONN, $query);
			$assoc_array = pg_fetch_all($rs);
			/** @var static[] $objects */
			$objects = [];
			foreach ($assoc_array as $row) {
				$objects[] = new static($row);
			}
			return $objects;
		}
	}

	static function load_by_condition($condition){
		$assoc_rows = pg_select(DBCONN, static::TABLE_NAME, $condition);
		/** @var static[] $objects */
		$objects = [];
		foreach ($assoc_rows as $row){
			$objects[] = new static($row);
		}

		return $objects;
	}
}

//class TestModel extends BaseModel{
//	const TABLE_NAME = 'test';
//}