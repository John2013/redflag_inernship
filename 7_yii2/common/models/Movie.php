<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "movies".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $poster
 * @property int $created_at
 * @property int $updated_at
 *
 * @method getImageFileUrl(string $prop_name)
 * @method getThumbFileUrl(string $prop_name, string $thumb_name)
 */
class Movie extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'movies';
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
				'filePath' => '@webroot/uploads/posters/[[pk]].[[extension]]',
				'fileUrl' => '/uploads/posters/[[pk]].[[extension]]',
				'thumbPath' => '@webroot/uploads/posters/[[profile]]_[[pk]].[[extension]]',
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
}
