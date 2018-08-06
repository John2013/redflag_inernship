<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "places".
 *
 * @property int $id
 * @property int $row_id
 * @property int $number
 * @property float $offset [double precision]
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Row $row
 * @property Reservation[] $reservations
 */
class Place extends \yii\db\ActiveRecord
{
	private $dont_after_save = false;

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
			[['row_id', 'number', 'offset'], 'required'],
			[['row_id', 'number', 'created_at', 'updated_at'], 'default', 'value' => null],
			[['row_id', 'created_at', 'updated_at'], 'integer'],
			[['number'], 'integer', 'min' => 1],
			[['offset'], 'default', 'value' => 0],
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
	public function getReservations()
	{
		return $this->hasMany(Reservation::class, ['place_id' => 'id']);
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

	/**
	 * {@inheritdoc}
	 */
	public function afterSave($insert, $changedAttributes)
	{
		parent::afterSave($insert, $changedAttributes);

		if ($this->dont_after_save) {
			$this->dont_after_save = false;
			return null;
		}

		$this->fixNumber();
	}

	/**
	 * {@inheritdoc}
	 */
	public function afterDelete()
	{
		parent::afterDelete();

		$next_model = self::find()
			->where(['row_id' => $this->row_id])
			->andWhere(['>', 'number', $this->number])
			->orderBy(['number' => SORT_ASC])
			->limit(1)
			->one();
		if (isset($next_model))
			$next_model->fixNumber();
	}

	public function fixNumber()
	{
		if ($this->number > 1) {
			$prev_model = self::find()
				->where(['row_id' => $this->row_id])
				->andWhere(['<', 'number', $this->number])
				->orderBy(['number' => SORT_DESC])
				->limit(1)
				->one();
			if ($prev_model->number == $this->number - 1)
				return null;

			$this->number = $prev_model->number + 1;
			$this->dont_after_save = true;
			$this->save();


			$next_model = self::find()
				->where(['row_id' => $this->row_id])
				->andWhere(['>', 'number', $this->number])
				->orderBy(['number' => SORT_ASC])
				->limit(1)
				->one();
			if (isset($next_model)) {
				$next_model->fixNumber();
			}
		}
	}
}
