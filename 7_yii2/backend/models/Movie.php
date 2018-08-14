<?php

namespace backend\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "movie".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $poster
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Genre[] $genres
 * @property MovieOption[] $options
 * @property Session[] $sessions
 *
 * @method getImageFileUrl(string $prop_name)
 * @method getThumbFileUrl(string $prop_name, string $thumb_name)
 * @todo Добавить жанры, возрастной рейтинг, длительность фильма и опции фильма (2D, 3D, IMAX 3D)
 */
class Movie extends \yii\db\ActiveRecord
{
	/**
	 * {@inheritdoc}
	 */
	public static function tableName()
	{
		return 'movie';
	}

	/**
	 * {@inheritdoc}
	 */
	public function behaviors()
	{
		return [
			TimestampBehavior::class,
			[
				'class' => '\yiidreamteam\upload\ImageUploadBehavior',
				'attribute' => 'poster',
				'thumbs' => [
					'thumb' => ['width' => 205, 'height' => 310],
				],
				'filePath' => '@uploads/posters/[[pk]].[[extension]]',
				'fileUrl' => '/uploads/posters/[[pk]].[[extension]]',
				'thumbPath' => '@uploads/posters/[[profile]]_[[pk]].[[extension]]',
				'thumbUrl' => '/uploads/posters/[[profile]]_[[pk]].[[extension]]',
			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['title', 'description', 'poster'], 'required'],
			[['description'], 'string'],
			[['created_at', 'updated_at'], 'default', 'value' => null],
			[['created_at', 'updated_at'], 'integer'],
			[['title'], 'string', 'max' => 255],
			[['poster'], 'file', 'extensions' => 'jpeg, jpg, png'],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function attributeLabels()
	{
		return [
			'id' => 'ID',
			'title' => 'Заголовок',
			'description' => 'Описание',
			'poster' => 'Постер',
			'created_at' => 'Создано',
			'updated_at' => 'Изменено',
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
			$list[$model->id] = $model->title;
		}
		return $list;
	}

	public function __toString()
	{
		return $this->title;
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getGenres()
	{
		return $this
			->hasMany(Genre::class, ['id' => 'genre_id'])
			->viaTable('genres_to_movies', ['movie_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getOptions()
	{
		return $this
			->hasMany(MovieOption::class, ['id' => 'option_id'])
			->viaTable('options_to_movies', ['movie_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSessions()
	{
		return $this->hasMany(Session::class, ['movie_id' => 'id']);
	}
}
