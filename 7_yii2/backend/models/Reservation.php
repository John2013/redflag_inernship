<?php

namespace app\models;

use common\models\User;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "reservation".
 *
 * @property int $id
 * @property int $user_id
 * @property int $place_id
 * @property int $status_id
 * @property int $session_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Place $place
 * @property ReservationStatus $status
 * @property Session $session
 * @property User $user
 */
class Reservation extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'reservation';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['user_id', 'place_id', 'status_id', 'session_id'], 'required'],
			[['user_id', 'place_id', 'status_id', 'session_id', 'created_at', 'updated_at'], 'default', 'value' => null],
			[['user_id', 'place_id', 'status_id', 'session_id', 'created_at', 'updated_at'], 'integer'],
			[['place_id'], 'exist', 'skipOnError' => true, 'targetClass' => Place::class, 'targetAttribute' => ['place_id' => 'id']],
			[['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ReservationStatus::class, 'targetAttribute' => ['status_id' => 'id']],
			[['session_id'], 'exist', 'skipOnError' => true, 'targetClass' => Session::class, 'targetAttribute' => ['session_id' => 'id']],
			[['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'user_id' => 'Пользователь',
			'place_id' => 'Место',
			'status_id' => 'Статус',
			'session_id' => 'Сеанс',
			'created_at' => 'Создано',
			'updated_at' => 'Изменено',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getPlace()
	{
		return $this->hasOne(Place::class, ['id' => 'place_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getStatus()
	{
		return $this->hasOne(ReservationStatus::class, ['id' => 'status_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSession()
	{
		return $this->hasOne(Session::class, ['id' => 'session_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getUser()
	{
		return $this->hasOne(User::class, ['id' => 'user_id']);
	}

	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			TimestampBehavior::class,
		];
	}
}
