<?php

namespace backend\models;


/**
 * This is the model class for table "reservation_status".
 *
 * @property int $id
 * @property string $name
 * @property string $title [varchar(255)]
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
        	[['name', 'title'], 'required'],
	        [['name', 'title'], 'string', 'max' => 255],
	        [['title'], 'unique'],
	        [['name'], 'unique'],
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
	        'title' => 'Заголовок',
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
