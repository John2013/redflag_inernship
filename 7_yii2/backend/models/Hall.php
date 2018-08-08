<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "halls".
 *
 * @property int $id
 * @property int $number
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Row[] $rows
 * @property Session[] $sessions
 *
 */
class Hall extends \yii\db\ActiveRecord
{
	private $dont_after_save = false;

	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'hall';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['number'], 'required'],
			[['number', 'created_at', 'updated_at'], 'default', 'value' => null],
			[['created_at', 'updated_at'], 'integer'],
			[['number'], 'integer', 'min' => 1],
			[['number'], 'unique'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'number' => 'Номер',
			'created_at' => 'Создано',
			'updated_at' => 'Изменено',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getRows()
	{
		return $this->hasMany(Row::class, ['hall_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSessions()
	{
		return $this->hasMany(Session::class, ['hall_id' => 'id']);
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
		$list = [];
		foreach ($models as $model) {
			$list[$model->id] = $model->number;
		}
		return $list;
	}

	/**
	 * @return bool
	 */
	public function addRow()
	{
		$max_row_number = Row::getMaxNumber($this->id);
		$new_row = new Row(['number' => $max_row_number + 1, 'hall_id' => $this->id]);
		return $new_row->save();
	}

	/**
	 * @return false|int
	 * @throws \Throwable
	 * @throws \yii\db\StaleObjectException
	 */
	public function deleteRow()
	{
		$max_row_number = Row::getMaxNumber($this->id);
		$row = Row::findOne(['hall_id' => $this->id, 'number' => $max_row_number]);
		if (!empty($row))
			return $row->delete();
		else
			return false;
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
			->where(['>', 'number', $this->number])
			->orderBy(['number' => SORT_ASC])
			->limit(1)
			->one();
		if (isset($next_model))
			$next_model->fixNumber();
	}

	/**
	 * @return null|void
	 */
	public function fixNumber()
	{
		if ($this->number > 1) {
			$prev_model = self::find()
				->where(['<', 'number', $this->number])
				->orderBy(['number' => SORT_DESC])
				->limit(1)
				->one();
			if ($prev_model->number == $this->number - 1)
				return null;

			$this->number = $prev_model->number + 1;
			$this->dont_after_save = true;
			$this->save();


			$next_model = self::find()
				->where(['>', 'number', $this->number])
				->orderBy(['number' => SORT_ASC])
				->limit(1)
				->one();
			if (isset($next_model)) {
				$next_model->fixNumber();
			}
		}
	}
}
