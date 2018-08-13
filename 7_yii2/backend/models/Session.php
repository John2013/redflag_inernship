<?php

namespace backend\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "session".
 *
 * @property string $id [integer]
 * @property string $movie_id [integer]
 * @property string $hall_id [integer]
 * @property string $tariff_id [integer]
 * @property string $created_at [integer]
 * @property string $updated_at [integer]
 * @property int $time [timestamp(0)]
 *
 * @property Reservation[] $reservations
 * @property Hall $hall
 * @property Movie $movie
 * @property Tariff $tariff
 */
class Session extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'session';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['movie_id', 'hall_id', 'tariff_id', 'time'], 'required'],
			[['movie_id', 'hall_id', 'tariff_id', 'created_at', 'updated_at'], 'default', 'value' => null],
			[['movie_id', 'hall_id', 'tariff_id', 'created_at', 'updated_at'], 'integer'],
			[['time'], 'safe'],
			[['hall_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hall::class, 'targetAttribute' => ['hall_id' => 'id']],
			[['movie_id'], 'exist', 'skipOnError' => true, 'targetClass' => Movie::class, 'targetAttribute' => ['movie_id' => 'id']],
			[['tariff_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tariff::class, 'targetAttribute' => ['tariff_id' => 'id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'movie_id' => 'Фильм',
			'hall_id' => 'Зал',
			'tariff_id' => 'Тариф',
			'time' => 'Время',
			'created_at' => 'Создано',
			'updated_at' => 'Изменено',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getReservations()
	{
		return $this->hasMany(Reservation::class, ['session_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getHall()
	{
		return $this->hasOne(Hall::class, ['id' => 'hall_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getMovie()
	{
		return $this->hasOne(Movie::class, ['id' => 'movie_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getTariff()
	{
		return $this->hasOne(Tariff::class, ['id' => 'tariff_id']);
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


	/**
	 * @return string
	 */
	public function getTime()
	{
		return date('d.m.Y H:i', strtotime($this->time));
	}

	/**
	 * @return array
	 */
	static public function listAll()
	{
		$models = self::find()->all();
		$movies_list = Movie::listAll();
		$list = [];
		foreach ($models as $model) {
			$list[$model->id] = "{$movies_list[$model->movie_id]} {$model->getTime()}";
		}
		return $list;
	}

	static function deleteNonActual()
	{
		self::deleteAll(['<', 'time', date('Y-m-d H:i:s')]);
	}
}
