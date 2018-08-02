<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "places".
 *
 * @property int $id
 * @property int $row_id
 * @property int $number
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Row $row
 * @property Reservation[] $reservations
 */
class Place extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'places';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['row_id', 'number'], 'required'],
            [['row_id', 'number', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['row_id', 'number', 'created_at', 'updated_at'], 'integer'],
            [['row_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rows::class, 'targetAttribute' => ['row_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'row_id' => 'Row ID',
            'number' => 'Number',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRow()
    {
        return $this->hasOne(Row::class, ['id' => 'row_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::class, ['place_id' => 'id']);
    }
}
