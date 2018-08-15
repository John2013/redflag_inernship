<?php

namespace backend\models;

/**
 * This is the model class for table "genres_to_movies".
 *
 * @property int $movie_id
 * @property int $genre_id
 *
 * @property Genre $genre
 * @property Movie $movie
 */
class GenresToMovies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genres_to_movies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['movie_id', 'genre_id'], 'required'],
            [['movie_id', 'genre_id'], 'default', 'value' => null],
            [['movie_id', 'genre_id'], 'integer'],
            [['movie_id', 'genre_id'], 'unique', 'targetAttribute' => ['movie_id', 'genre_id']],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::class, 'targetAttribute' => ['genre_id' => 'id']],
            [['movie_id'], 'exist', 'skipOnError' => true, 'targetClass' => Movie::class, 'targetAttribute' => ['movie_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'movie_id' => 'Movie ID',
            'genre_id' => 'Genre ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genre::class, ['id' => 'genre_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovie()
    {
        return $this->hasOne(Movie::class, ['id' => 'movie_id']);
    }
}
