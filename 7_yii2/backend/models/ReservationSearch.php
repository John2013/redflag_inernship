<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ReservationSearch represents the model behind the search form of `app\models\Reservation`.
 */
class ReservationSearch extends Reservation
{
	public $user_nickname;
	public $hall_number;
	public $row_number;
	public $place_number;
	public $status_name;
	public $movie_title;
	public $session_time;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'place_id', 'status_id', 'session_id', 'created_at', 'updated_at',
	            'row_number', 'hall_number', 'place_number'], 'integer'],
	        [['user_nickname', 'status_name', 'movie_title', 'session_time'], 'string']
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
        $query = Reservation::find()->joinWith(['user', 'hall', 'status', 'movie']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);
        $dataProvider->setSort([
	    'attributes' => [
		    'place_number' => [
			    'asc' => [
				    'place.number' => SORT_ASC,
			    ],
			    'desc' => [
				    'place.number' => SORT_DESC,
			    ],
			    'label' => 'Место',
			    'default' => SORT_ASC
		    ],
		    'row_number' => [
			    'asc' => [
				    'row.number' => SORT_ASC,
			    ],
			    'desc' => [
				    'row.number' => SORT_DESC,
			    ],
			    'label' => 'Ряд',
			    'default' => SORT_ASC
		    ],
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
		    'user_nickname' => [
			    'asc' => [
				    'user.username' => SORT_ASC,
			    ],
			    'desc' => [
				    'user.username' => SORT_DESC,
			    ],
			    'label' => 'Пользователь',
			    'default' => SORT_ASC
		    ],
		    'status_name' => [
			    'asc' => [
				    'reservation_status.name' => SORT_ASC,
			    ],
			    'desc' => [
				    'reservation_status.name' => SORT_DESC,
			    ],
			    'label' => 'Статус',
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
		    'session_time' => [
			    'asc' => [
				    'session.time' => SORT_ASC,
			    ],
			    'desc' => [
				    'session.time' => SORT_DESC,
			    ],
			    'label' => 'Время',
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
        $query
	        ->andFilterWhere([
            'reservation.id' => $this->id,
	        'place.number' => $this->place_number,
	        'hall.number' => $this->hall_number,
	        'row.number' => $this->row_number,
	        'session.time' => $this->session_time,
            'reservation.created_at' => $this->created_at,
            'reservation.updated_at' => $this->updated_at,
        ])
	        ->andFilterWhere(['ilike', 'user.username', $this->user_nickname])
	        ->andFilterWhere(['ilike', 'reservation_status.name', $this->status_name])
	        ->andFilterWhere(['ilike', 'movie.title', $this->movie_title]);

        return $dataProvider;
    }
}
