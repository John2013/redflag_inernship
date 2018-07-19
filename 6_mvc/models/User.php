<?php

use Ramsey\Uuid\Uuid;

/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 19.07.2018
 * Time: 13:48
 */

class User
{
	public $id;
	public $login;
	private $password_hash;
	public $is_admin;
	public $session_id;
	public $password;

	function __construct($login, $password)
	{
	}

	function create_password_hash(){
		$this->password_hash = crypt($this->password);
		return $this->password_hash;
	}

	function check_password(){
		return $this->password_hash == crypt($this->password);
	}

	function create_sessid(){
		$this->session_id = Uuid::uuid4();
		$_COOKIE['session_id'] = $this->session_id;
		return $this->session_id;
	}


}