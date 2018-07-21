<?php
/*
use Ramsey\Uuid\Uuid;

/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 19.07.2018
 * Time: 13:48
 *\/

class User
{
	public $id;
	public $login;
	private $password_hash;
	public $is_admin;
	public $session_id;
	public $password;
	public $created_at;
	public $updated_at;

	const TABLE_NAME = 'users';
	public $table_name = self::TABLE_NAME;

	function __construct($assoc_array)
	{
		$this->set_by_assoc($assoc_array);
	}

	function set_by_assoc($assoc_array){
		$this->id = $assoc_array['id'];
		$this->login = $assoc_array['login'];
		$this->password_hash = $assoc_array['password_hash'];
		$this->is_admin = $assoc_array['is_admin'];
		$this->session_id = $assoc_array['session_id'];
		$this->password = $assoc_array['password'];
		$this->created_at = $assoc_array['created_at'] ?: time();
		$this->updated_at = $assoc_array['updated_at'] ?: $this->created_at;
	}

	function get_assoc(){
		return [
			'id' => $this->id,
			'login' => $this->login,
			'password_hash' => $this->password_hash,
			'is_admin' => $this->is_admin,
			'session_id' => $this->session_id,
			'created_at' => $this->created_at,
			'updated_at' => $this->updated_at
		];
	}

	function create(){
		$this->create_password_hash();
		$this->create_sessid(false);
		$result = pg_insert(DBCONN, $this->table_name, $this->get_assoc());

		$query = "SELECT * FROM $this->table_name ORDER BY id DESC LIMIT 1;";
		$rs = pg_query(DBCONN, $query);
		$assoc_array = pg_fetch_assoc($rs)[0];

		$this->set_by_assoc($assoc_array);
		return $result;
	}

	function update(){
		$this->updated_at = time();
		$condition = ['id' => $this->id];
		return pg_update(DBCONN, $this->table_name, $this->get_assoc(), $condition);
	}

	function save(){
		return $this->id? $this->update() : $this->create();
	}

	private function create_password_hash(){
		$this->password_hash = crypt($this->password);
		return $this->password_hash;
	}

	function check_password(){
		return $this->password_hash == crypt($this->password);
	}

	function create_sessid($save=true){
		$this->session_id = Uuid::uuid4();
		if($save){
			$this->updated_at = time();
			$data = ['session_id' => $this->session_id, 'updated_at'=>$this->updated_at];
			$condition = ['id' => $this->id];
			pg_update(DBCONN, $this->table_name, $data, $condition);
		}

		$_COOKIE['session_id'] = $this->session_id;
		return $this->session_id;
	}

	static function register($login, $password){
		$user = new self(['login'=>$login, 'password'=>$password]);
		$result = $user->create();
		if(!$result){
			assert('sameLogin');
		}
		return $user;
	}

	static function getBySessid($sessid){
		$rs = pg_select(DBCONN, self::TABLE_NAME, ['session_id' => $sessid]);
	}
}*/