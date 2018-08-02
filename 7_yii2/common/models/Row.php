<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rows".
 *
 * @property int $id
 * @property int $hall_id
 * @property int $number
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Place[] $places
 * @property Hall $hall
 */
class Row extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rows';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hall_id', 'number'], 'required'],
            [['hall_id', 'number', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['hall_id', 'number', 'created_at', 'updated_at'], 'integer'],
            [['hall_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hall::class, 'targetAttribute' => ['hall_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'hall_id' => 'Hall ID',
            'number' => 'Number',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlaces()
    {
        return $this->hasMany(Place::class, ['row_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHall()
    {
        return $this->hasOne(Hall::class, ['id' => 'hall_id']);
    }
}
