<?php

namespace backend\models;

/**
 * This is the model class for table "place_to_reservation".
 *
 * @property int $place_id
 * @property int $reservation_id
 *
 * @property Place $place
 * @property Reservation $reservation
 */
class PlaceToReservation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'place_to_reservation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['place_id', 'reservation_id'], 'required'],
            [['place_id', 'reservation_id'], 'default', 'value' => null],
            [['place_id', 'reservation_id'], 'integer'],
            [['place_id', 'reservation_id'], 'unique', 'targetAttribute' => ['place_id', 'reservation_id']],
            [['place_id'], 'exist', 'skipOnError' => true, 'targetClass' => Place::class, 'targetAttribute' => ['place_id' => 'id']],
            [['reservation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reservation::class, 'targetAttribute' => ['reservation_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'place_id' => 'Place ID',
            'reservation_id' => 'Reservation ID',
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
    public function getReservation()
    {
        return $this->hasOne(Reservation::class, ['id' => 'reservation_id']);
    }
}
