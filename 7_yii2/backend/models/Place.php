<?php

namespace backend\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "place".
 *
 * @property int $id
 * @property int $row_id
 * @property int $number
 * @property float $offset [double precision]
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Row $row
 * @property PlaceToReservation[] $placeToReservations
 * @property Reservation[] $reservations
 */
class Place extends NumberedModel
{

	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'place';
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
			[['offset'], 'number'],
			[['row_id', 'number'], 'unique', 'targetAttribute' => ['row_id', 'number']],
			[['row_id'], 'exist', 'skipOnError' => true, 'targetClass' => Row::class, 'targetAttribute' => ['row_id' => 'id']],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'row_id' => 'Ряд',
			'number' => 'Номер',
			'offset' => 'Отступ слева',
			'created_at' => 'Создано',
			'updated_at' => 'Изменено',
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
	public function getHall()
	{
		return $this->hasOne(Hall::class, ['id' => 'hall_id'])->viaTable('row', ['id' => 'row_id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getPlaceToReservations()
	{
		return $this->hasMany(PlaceToReservation::class, ['place_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getReservations()
	{
		return $this->hasMany(Reservation::class, ['id' => 'reservation_id'])->viaTable('place_to_reservation', ['place_id' => 'id']);
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
	 * @return array
	 */
	static public function listAll()
	{
		$models = self::find()->all();
		$rows_list = Row::listAll();
		$list = [];
		foreach ($models as $model) {
			$list[$model->id] = "{$rows_list[$model->row_id]} место $model->number";
		}
		return $list;
	}

	public function fixNumber()
	{
		return parent::_fixNumber('row_id');
	}

	public function __toString()
	{
		return "Зал " . $this->row->hall->number . " ряд " . $this->row->number . " место " . $this ->number;
	}
	
	public function isFree(int $session_id){
		$isReserved = (bool) Reservation::find()
			->select(['id'])
			->joinWith('places')
			->where(['session_id' => $session_id])
			->andWhere(['place.id'=>$this->id])
			->count();

		return $isReserved;
	}
}
