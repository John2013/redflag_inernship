<?php

namespace backend\models;

/**
 * This is the model class for table "options_to_movies".
 *
 * @property int $movie_id
 * @property int $option_id
 *
 * @property Movie $movie
 * @property MovieOption $option
 */
class OptionsToMovies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'options_to_movies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['movie_id', 'option_id'], 'required'],
            [['movie_id', 'option_id'], 'default', 'value' => null],
            [['movie_id', 'option_id'], 'integer'],
            [['movie_id', 'option_id'], 'unique', 'targetAttribute' => ['movie_id', 'option_id']],
            [['movie_id'], 'exist', 'skipOnError' => true, 'targetClass' => Movie::class, 'targetAttribute' => ['movie_id' => 'id']],
            [['option_id'], 'exist', 'skipOnError' => true, 'targetClass' => MovieOption::class, 'targetAttribute' => ['option_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'movie_id' => 'Movie ID',
            'option_id' => 'Option ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovie()
    {
        return $this->hasOne(Movie::class, ['id' => 'movie_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOption()
    {
        return $this->hasOne(MovieOption::class, ['id' => 'option_id']);
    }
}
