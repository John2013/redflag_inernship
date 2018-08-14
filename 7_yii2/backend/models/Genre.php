<?php

namespace backend\models;

/**
 * This is the model class for table "genre".
 *
 * @property int $id
 * @property string $name
 *
 * @property Movie[] $movies
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'genre';
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
            'name' => 'Название',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovies()
    {
        return $this
	        ->hasMany(Movie::class, ['id' => 'movie_id'])
	        ->viaTable('genres_to_movies', ['genre_id' => 'id']);
    }

    static public function listAll(){
    	$models = self::find()->all();

    	$list = [];
    	foreach ($models as $model){
		    $list[$model->id] = $model->name;
	    }
    }

	public function __toString()
	{
		return $this->name;
	}
}
