<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * SessionSearch represents the model behind the search form of `backend\models\Session`.
 */
class SessionSearch extends Session
{
	public $movie_title;
	public $hall_number;
	public $tariff_name;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'movie_id', 'hall_id', 'tariff_id', 'time', 'created_at', 'updated_at', 'hall_number'], 'integer'],
	        [['movie_title', 'tariff_name'], 'string'],
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
        $query = Session::find()->joinWith(['movie', 'hall', 'tariff']);

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
				    'label' => 'Зал',
				    'default' => SORT_ASC
			    ],
			    'movie_title' => [
				    'asc' => [
					    'movie.title' => SORT_ASC,
				    ],
				    'desc' => [
					    'movie.title' => SORT_DESC,
				    ],
				    'label' => 'Фильм',
				    'default' => SORT_ASC
			    ],
			    'tariff_name' => [
				    'asc' => [
					    'tariff.name' => SORT_ASC,
				    ],
				    'desc' => [
					    'tariff.name' => SORT_DESC,
				    ],
				    'label' => 'Тариф',
				    'default' => SORT_ASC
			    ],
			    'id',
			    'time',
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
            'time' => $this->time,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
	        'hall.number' => $this->hall_number
        ])
	        ->andFilterWhere(['ilike', 'movie.title', $this->movie_title])
	        ->andFilterWhere(['ilike', 'tariff.name', $this->tariff_name]);

        return $dataProvider;
    }
}
