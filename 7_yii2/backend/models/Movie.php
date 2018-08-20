<?php

namespace backend\models;

use common\widgets\Pprint;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "movie".
 *
 * @property string $id [integer]
 * @property string $title [varchar(255)]
 * @property string $description
 * @property string $created_at [integer]
 * @property string $updated_at [integer]
 * @property string $poster [varchar(255)]
 * @property string $duration [integer]
 * @property string $trailer [varchar(255)]
 *
 * @property Genre[] $genres
 * @property GenresToMovies[] $genresToMovies
 * @property Session[] $sessions
 * @property string $age_limit [integer]
 *
 * @method getImageFileUrl(string $prop_name)
 * @method getThumbFileUrl(string $prop_name, string $thumb_name)
 */
class Movie extends \yii\db\ActiveRecord
{
	public $genre_ids;
	public $option_ids;

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
//			[
//				'class' => \voskobovich\linker\LinkerBehavior::class,
//				'relations' => [
//					'genre_ids' => 'genres',
//					'option_ids' => 'options',
//				],
//			],
		];
	}

	/**
	 * {@inheritdoc}
	 */
	public function rules()
	{
		return [
			[['title', 'description', 'duration', 'trailer', 'age_limit'], 'required'],
			[['description'], 'string'],
			[['trailer'], 'string', 'max' => 255],
			[['created_at', 'updated_at'], 'default', 'value' => null],
			[['created_at', 'updated_at'], 'integer',],
			[['duration'], 'default', 'value' => 120],
			[['age_limit'], 'default', 'value' => 18],
			[['duration', 'age_limit'], 'integer', 'min' => 0],
			[['title'], 'string', 'max' => 255],
			[['poster'], 'file', 'extensions' => 'jpeg, jpg, png'],
			[['genre_ids'], 'each', 'rule' => ['integer']],
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
			'duration' => 'Длительность (мин)',
			'poster' => 'Постер',
			'genre_ids' => 'Жанры',
			'trailer' => 'Трейлер',
			'age_limit' => 'Возрастное ограничение',
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
	public function getGenresToMovies()
	{
		return $this->hasMany(GenresToMovies::class, ['movie_id' => 'id']);
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getSessions()
	{
		return $this->hasMany(Session::class, ['movie_id' => 'id']);
	}

	private function updateGenres()
	{
		GenresToMovies::deleteAll(['movie_id' => $this->id]);

		if (is_array($this->genre_ids))
			foreach ($this->genre_ids as $genre_id) {
				$genre = new GenresToMovies(['movie_id' => $this->id, 'genre_id' => $genre_id]);
				$genre->save();
			}

	}

	/**
	 * Обновить данные от связей многие ко многим
	 */
	private function updateM2M()
	{
		$this->updateGenres();
	}

	/**
	 * {@inheritdoc}
	 */
	public function afterSave($insert, $changedAttributes)
	{
		parent::afterSave($insert, $changedAttributes);

		$this->updateM2M();
	}

	/**
	 * Возвращает список названий форматов сеансов фильмов
	 *
	 * @param bool $add_age_limit Добавить возрастное ограничение последним элементом
	 * @return string[]
	 */
	public function getFormatList($add_age_limit = false){
		$formatsArr = $this
			->getSessions()
			->select(['format.name'])
			->where(['>=', 'session.time', date('Y-m-d H:i:s')])
			->leftJoin('format', 'session.format_id = format.id')
			->groupBy('format.name')
			->asArray()
			->all();

		$formatsList = ArrayHelper::getColumn($formatsArr, 'name');
		if($add_age_limit)
			$formatsList[] = $this->age_limit . '+';

		return $formatsList;
	}
}
