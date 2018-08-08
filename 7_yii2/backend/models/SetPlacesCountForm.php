<?php

namespace app\models;

use common\widgets\Pprint;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SetPlacesCountForm extends Model
{
	public $count;
	public $row_id;


	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['count', 'row_id'], 'required'],
			[['count', 'row_id'], 'integer', 'min' => 1],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'count' => 'Количество мест',
			'row_id' => 'Ряд',
		];
	}


	public function setPlacesCount()
	{
		$row = Row::findOne($this->row_id);


		$row->setPlacesCount($this->count);
	}
}
