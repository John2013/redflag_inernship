<?php

namespace backend\models;

/**
 * This is the model class for table "movie_option".
 *
 * @property int $id
 * @property string $name
 *
 * @property Movie[] $movies
 */
class MovieOption extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'movie_option';
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['name'], 'required'],
			[['name'], 'string', 'max' => 255],
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
			'name' => 'Name',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getMovies()
	{
		return $this
			->hasMany(Movie::class, ['id' => 'movie_id'])
			->viaTable('options_to_movies', ['option_id' => 'id']);
	}
}
