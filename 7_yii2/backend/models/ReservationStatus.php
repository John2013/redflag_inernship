<?php

namespace backend\models;


/**
 * This is the model class for table "reservation_status".
 *
 * @property int $id
 * @property string $name
 *
 * @property Reservation[] $reservations
 */
class ReservationStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reservation_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservations()
    {
        return $this->hasMany(Reservation::class, ['status_id' => 'id']);
    }

	/**
	 * @return array
	 */
	static public function listAll(){
		$models = self::find()->all();
		$list = [];
		foreach ($models as $model){
			$list[$model->id] = $model->name;
		}
		return $list;
	}
}
