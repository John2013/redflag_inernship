<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ReservationSearch represents the model behind the search form of `backend\models\Reservation`.
 */
class ReservationSearch extends Reservation
{
	public $user_nickname;
	public $status_name;
	public $movie_title;
	public $session_time;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'status_id', 'session_id', 'created_at', 'updated_at'], 'integer'],
	        [['user_nickname', 'status_name', 'movie_title', /*'session_time'*/], 'string'],
	        [['session_time'], 'datetime']
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
        $query = Reservation::find()->joinWith(['user', 'status', 'movie']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => ['defaultOrder' => ['id' => SORT_DESC]]
        ]);
        $dataProvider->setSort([
	    'attributes' => [
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
