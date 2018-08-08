<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 08.08.2018
 * Time: 11:33
 *
 * @noinspection ALL
 */

namespace app\models;

class NumberedModel extends \yii\db\ActiveRecord
{
	protected $dont_after_save = false;

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

	/**
	 * Fixing a number of numbered model
	 *
	 * @param null|string $fk_field tables foregn key for filtring records
	 * @return null|void
	 */
	protected function _fixNumber($fk_field = null)
	{
		if ($this->number > 1) {

			//проверка на наличие первого элемента
			$query = self::find()
				->where(['number' => 1]);

			if (isset($fk_field))
				$query = $query->andWhere([$fk_field => $this->$fk_field]);
			if (!$query->exists()) {
				$this->number = 1;
				$this->save();
				return null;
			}

			$query = self::find()
				->where(['<', 'number', $this->number])
				->orderBy(['number' => SORT_DESC])
				->limit(1);


			$prev_model = $query->one();

			if ($prev_model->number == $this->number - 1)
				return null;

			$this->number = $prev_model->number + 1;
			$this->dont_after_save = true;
			$this->save();


			$query = self::find()
				->where(['>', 'number', $this->number])
				->orderBy(['number' => SORT_ASC])
				->limit(1);

			if (isset($fk_field))
				$query = $query->andWhere([$fk_field => $this->$fk_field]);

			$next_model = $query->one();

			if (isset($next_model)) {
				$next_model->fixNumber();
			}
		}
	}
}