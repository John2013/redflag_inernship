<?php

namespace frontend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
	public $username;
	public $first_name;
	public $last_name;
	public $email;
	public $password;
	public $avatar;


	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			['username', 'trim'],
			['username', 'required'],
			['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
			['username', 'string', 'min' => 2, 'max' => 255],

			['email', 'trim'],
			['email', 'required'],
			['email', 'email'],
			['email', 'string', 'max' => 255],
			['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

			['first_name', 'trim'],
			['first_name', 'required'],
			['first_name', 'string', 'min' => 2, 'max' => 255],

			['last_name', 'trim'],
			['last_name', 'required'],
			['last_name', 'string', 'min' => 2, 'max' => 255],

			['avatar', 'trim'],
			['avatar', 'file', 'extensions' => 'jpeg, jpg, png'],

			['password', 'required'],
			['password', 'string', 'min' => 6],
		];
	}

	/**
	 * Signs user up.
	 *
	 * @return User|null the saved model or null if saving fails
	 * @throws \yii\base\Exception
	 */
	public function signup()
	{
		if (!$this->validate()) {
			return null;
		}

		$user = new User();
		$user->username = $this->username;
		$user->email = $this->email;
		$user->first_name = $this->first_name;
		$user->last_name = $this->last_name;
		$user->avatar = $this->avatar;
		$user->setPassword($this->password);
		$user->generateAuthKey();

		return $user->save() ? $user : null;
	}
}
