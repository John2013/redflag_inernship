<?php

namespace backend\models;

use common\models\User;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "reservation".
 *
 * @property int $id
 * @property int $user_id
 * @property int $status_id
 * @property int $session_id
 * @property int $created_at
 * @property int $updated_at
 *
 * @property PlaceToReservation[] $placeToReservation
 * @property Place[] $places
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
			[['user_id', 'status_id', 'session_id'], 'required'],
			[['user_id', 'status_id', 'session_id', 'created_at', 'updated_at'], 'default', 'value' => null],
			[['user_id', 'status_id', 'session_id', 'created_at', 'updated_at'], 'integer'],
			[['user_id', 'session_id'], 'unique', 'targetAttribute' => ['user_id', 'session_id']],
			[['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => ReservationStatus::class, 'targetAttribute' => ['status_id' => 'id']],
			[['session_id'], 'exist', 'skipOnError' => true, 'targetClass' => Session::class, 'targetAttribute' => ['session_id' => 'id']],
			[['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
			[['place_ids'], 'each', 'rule' => ['integer']]
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
			'status_id' => 'Статус',
			'session_id' => 'Сеанс',
			'created_at' => 'Создано',
			'updated_at' => 'Изменено',
			'place_ids' => 'Места',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getPlaceToReservation()
	{
		return $this->hasMany(PlaceToReservation::class, ['reservation_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getPlaces()
	{
		return $this
			->hasMany(Place::class, ['id' => 'place_id'])
			->viaTable('place_to_reservation', ['reservation_id' => 'id']);
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
	public function getMovie()
	{
		return $this
			->hasOne(Movie::class, ['id' => 'movie_id'])
			->viaTable('session', ['id' => 'session_id']);
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
			[
				'class' => \voskobovich\linker\LinkerBehavior::class,
				'relations' => [
					'place_ids' => [
						'places'
					],
				],
			]
		];
	}
}
