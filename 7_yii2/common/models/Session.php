<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sessions".
 *
 * @property int $id
 * @property int $movie_id
 * @property int $hall_id
 * @property int $tariff_id
 * @property int $time
 * @property int $created_at
 * @property int $updated_at
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
        return 'sessions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['movie_id', 'hall_id', 'tariff_id', 'time'], 'required'],
            [['movie_id', 'hall_id', 'tariff_id', 'time', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['movie_id', 'hall_id', 'tariff_id', 'time', 'created_at', 'updated_at'], 'integer'],
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
            'movie_id' => 'Movie ID',
            'hall_id' => 'Hall ID',
            'tariff_id' => 'Tariff ID',
            'time' => 'Time',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
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
}
