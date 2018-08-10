<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * RowSearch represents the model behind the search form of `backend\models\Row`.
 */
class RowSearch extends Row
{
	public $hall_number;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'hall_id', 'number', 'hall_number', 'created_at', 'updated_at'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Row::find()->joinWith('hall');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);

	    $dataProvider->setSort([
		    'attributes' => [
			    'hall_number' => [
				    'asc' => [
					    'hall.number' => SORT_ASC,
				    ],
				    'desc' => [
					    'hall.number' => SORT_DESC,
				    ],
				    'label' => 'Номер зала',
				    'default' => SORT_ASC
			    ],
			    'id',
			    'number',
			    'created_at',
			    'updated_at',
		    ]
	    ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'hall_id' => $this->hall_id,
            'number' => $this->number,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

	    $query->andFilterWhere([
		    'hall.number'=>$this->hall_number,
	    ]);

        return $dataProvider;
    }
}
