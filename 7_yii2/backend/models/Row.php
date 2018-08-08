<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "row".
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
class Row extends NumberedModel
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'row';
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
			[['number'], 'integer', 'min' => 1],
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
			'hall_id' => 'Зал',
			'number' => 'Номер',
			'created_at' => 'Создано',
			'updated_at' => 'Изменено',
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
		$halls_list = Hall::listAll();
		$list = [];
		foreach ($models as $model) {
			$list[$model->id] = "зал {$halls_list[$model->hall_id]} ряд $model->number";
		}
		return $list;
	}

	/**
	 * @param int $hall_id
	 * @return int
	 */
	static public function getMaxNumber(int $hall_id)
	{
		return (int)array_reduce(self::find()->where(['hall_id' => $hall_id])->all(), function ($maxNumber, $row) {
			return ($row->number > $maxNumber)
				? $row->number
				: $maxNumber;
		}, 0);
	}

	public function setPlacesCount(int $count)
	{
		$places = $this->getPlaces()->orderBy(['number' => SORT_DESC])->all();
		$maxNumber = array_reduce($places, function ($maxNumber, $place) {
			return ($place->number > $maxNumber)
				? $place->number
				: $maxNumber;
		}, 0);
		if (count($places) == $count) {
			return null;
		} elseif (count($places) < $count) {
			for ($number = $maxNumber + 1; $number <= $count; $number++) {
				$newPlace = new Place(['row_id' => $this->id, 'number' => $number, 'offset' => 0]);
				$newPlace->save();
			}

		} else {
			foreach ($places as $place) {
				if ($place->number <= $count) {
					break;
				}
				$place->delete();
			}
		}
	}

	public function fixNumber()
	{
		return parent::_fixNumber('hall_id');
	}
}
