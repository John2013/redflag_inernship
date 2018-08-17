<?php

namespace backend\models;

use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "format".
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Session[] $sessions
 */
class Format extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'format';
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
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'default', 'value' => null],
            [['created_at', 'updated_at'], 'integer'],
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
            'created_at' => 'Создано',
            'updated_at' => 'Изменено',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSessions()
    {
        return $this->hasMany(Session::class, ['format_id' => 'id']);
    }

    static public function listAll(){
    	$models = self::find()->asArray()->all();
    	return ArrayHelper::map($models, 'id', 'name');
    }
}
