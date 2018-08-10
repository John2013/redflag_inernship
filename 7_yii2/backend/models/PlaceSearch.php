<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PlaceSearch represents the model behind the search form of `backend\models\Place`.
 */
class PlaceSearch extends Place
{
	public $row_number;
	public $hall_number;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'row_id', 'number', 'offset', 'row_number', 'hall_number', 'created_at', 'updated_at'], 'integer'],
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
        $query = Place::find()->joinWith('hall');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);
	    $dataProvider->setSort([
		    'attributes' => [
			    'row_number' => [
				    'asc' => [
					    'row.number' => SORT_ASC,
				    ],
				    'desc' => [
					    'row.number' => SORT_DESC,
				    ],
				    'label' => 'Номер ряда',
				    'default' => SORT_ASC
			    ],
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
			    'offset',
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
            'row_id' => $this->row_id,
	        'number' => $this->number,
	        'offset' => $this->offset,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);
        $query->andFilterWhere([
	        'row.number'=>$this->row_number,
	        'hall.number'=>$this->hall_number,
        ]);

        return $dataProvider;
    }
}
