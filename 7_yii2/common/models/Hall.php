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
 *
 * @property Row[] $rows
 * @property Session[] $sessions
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
            'number' => 'Number',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRows()
    {
        return $this->hasMany(Row::className(), ['hall_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSessions()
    {
        return $this->hasMany(Session::className(), ['hall_id' => 'id']);
    }
}
