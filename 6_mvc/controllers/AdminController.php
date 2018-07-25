<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 23.07.2018
 * Time: 13:01
 */

class AdminController extends BaseController
{
	public $layout = 'admin';
	public $main_menu;

	function __construct()
	{
		$this->main_menu = main_menu([
			[
				'id'=>10,
				'title'=>'фильмы',
				'url'=> '/6_mvc/admin/index.php'
			],
			[
				'id'=>11,
				'title'=>'кинозалы',
				'url'=> '/6_mvc/admin/halls.php'
			],
			[
				'id'=>12,
				'title'=>'места',
				'url'=> '/6_mvc/admin/places.php'
			],
			[
				'id'=>13,
				'title'=>'тарифы',
				'url'=> '/6_mvc/admin/tariffs.php'
			],
			[
				'id'=>14,
				'title'=>'сеансы',
				'url'=> '/6_mvc/admin/sessions.php'
			],
			[
				'id'=>15,
				'title'=>'бронирование',
				'url'=> '/6_mvc/admin/reservation.php'
			]

		]);
	}

	function actionIndex(){
		$movies = Movie::load();
		return $this->render("admin_movies", "список фильмов",
			['movies' => $movies, 'main_menu' => $this->main_menu]);
	}

	function actionAdd($model_class_name){
		$model = new $model_class_name();
		return $this->render("admin_add", "добавление",
			['model' => $model, 'main_menu' => $this->main_menu]);
	}

	/**
	 * @param HallRow|Movie|MovieHall|Place|Reservation|Session|Tariff $model_class_name
	 * @param $id
	 * @return string
	 */
	function actionDelete($model_class_name, $id){
//		$model = new $model_class_name();

		$res = $model_class_name::delete($id);
		return $this->render("admin_delete", "удаление",
			['result' => $res, 'main_menu' => $this->main_menu]);
	}

	function actionSessions(int $movie_id){
		$movie = Movie::load($movie_id);
		$sessions = $movie->get_sessions();
		$sessions_dates = [];
		$main_menu = main_menu();
		foreach ($sessions as $session){
			$date = strtotime(date('d.m.Y 0:00:00', $session->time));
			$sessions_dates[$date][] = $session;
		}

		return $this->render("sessions", "сеансы",
			['movie' => $movie, 'sessions_dates' => $sessions_dates, 'main_menu' => $main_menu]);
	}

	function actionSession(int $id){
		$session = Session::load_with_hall_number($id);
		$movie = $session->get_movie();
		$main_menu = main_menu();

		return $this->render("session", "сеанс",
			['movie' => $movie, 'session' => $session, 'main_menu' => $main_menu]);
	}
}