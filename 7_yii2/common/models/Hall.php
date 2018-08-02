<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "halls".
 *
 * @property int $id
 * @property int $number
 * @property int $created_at
 * @property int $updated_at
 */
class Hall extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'halls';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number'], 'required'],
            [['number', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['number', 'created_at', 'updated_at'], 'integer'],
            [['number'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Номер',
            'created_at' => 'Создано',
            'updated_at' => 'Изменено',
        ];
    }
}
