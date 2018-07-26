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
				'id' => 10,
				'title' => 'фильмы',
				'url' => '/6_mvc/admin/index.php'
			],
			[
				'id' => 11,
				'title' => 'кинозалы',
				'url' => '/6_mvc/admin/halls.php'
			],
			[
				'id' => 12,
				'title' => 'места',
				'url' => '/6_mvc/admin/places.php'
			],
			[
				'id' => 13,
				'title' => 'тарифы',
				'url' => '/6_mvc/admin/tariffs.php'
			],
			[
				'id' => 14,
				'title' => 'сеансы',
				'url' => '/6_mvc/admin/sessions.php'
			],
			[
				'id' => 15,
				'title' => 'бронирование',
				'url' => '/6_mvc/admin/reservation.php'
			]

		], 'dark');
	}

	function actionIndex()
	{
		$movies = Movie::load();
		return $this->render("admin_movies", "список фильмов",
			['movies' => $movies, 'main_menu' => $this->main_menu]);
	}

	function actionHalls()
	{
		$halls = MovieHall::load();
		return $this->render("admin_halls", "список кинозалов",
			['halls' => $halls, 'main_menu' => $this->main_menu]);
	}

	function actionTariffs()
	{
		$tariffs = Tariff::load();
		return $this->render("admin_tariffs", "список кинозалов",
			['tariffs' => $tariffs, 'main_menu' => $this->main_menu]);
	}

	function actionSessions(){
		$sessions = Session::load();
		return $this->render("admin_sessions", "список кинозалов",
			['sessions' => $sessions, 'main_menu' => $this->main_menu]);
	}

	function actionReservation(){
		$reservations = Reservation::load();
		return $this->render("admin_reservation", "список брони",
			['reservations' => $reservations, 'main_menu' => $this->main_menu]);
	}

	function actionDetail()
	{
		$model_name = $_REQUEST['detail']['class_name'];
		$id = (int)$_REQUEST['detail']['id'];

		/** @var HallRow|Movie|MovieHall|Place|Reservation|Session|Tariff $model_name */
		$model = $model_name::load($id);
		return $this->render("admin_detail", "детально",
			['model' => $model, 'main_menu' => $this->main_menu]);
	}

	function actionAdd()
	{
		$model_name = $_REQUEST['add']['class_name'];
		$res = null;
		if (count($_REQUEST['add']) > 1) {
			/** @var HallRow|Movie|MovieHall|Place|Reservation|Session|Tariff $model */
			$model = new $model_name($_REQUEST['add']);
			$res = $model->save();
		}

		$model = new $model_name();
		return $this->render("admin_add", "добавление",
			['model' => $model, 'res' => $res, 'main_menu' => $this->main_menu]);
	}

	function actionChange()
	{
		/** @var HallRow|Movie|MovieHall|Place|Reservation|Session|Tariff $model_name */
		$model_name = $_REQUEST['change']['class_name'];
		$id = (int)$_REQUEST['change']['id'];
		$res = null;
		if (count($_REQUEST['change']) > 2) {
			/** @var HallRow|Movie|MovieHall|Place|Reservation|Session|Tariff $model */
			$model = new $model_name($_REQUEST['change']);
			$res = $model->save();
		}

		$model = $model_name::load($id);
		return $this->render("admin_change", "изменение",
			['model' => $model, 'res' => $res, 'main_menu' => $this->main_menu]);
	}

	function actionDelete()
	{
		/** @var HallRow|Movie|MovieHall|Place|Reservation|Session|Tariff $model_name */
		$model_name = $_REQUEST['del']['class_name'];
		$id = (int)$_REQUEST['del']['id'];

		$res = $model_name::delete($id);
		return $this->render("admin_delete", "удаление",
			['result' => $res, 'main_menu' => $this->main_menu]);
	}

	function actionMovieSessions(int $movie_id)
	{
		$movie = Movie::load($movie_id);
		$sessions = $movie->get_sessions();
		$sessions_dates = [];
		$main_menu = main_menu();
		foreach ($sessions as $session) {
			$date = strtotime(date('d.m.Y 0:00:00', $session->time));
			$sessions_dates[$date][] = $session;
		}

		return $this->render("admin_movie_sessions", "сеансы фильма",
			['movie' => $movie, 'sessions_dates' => $sessions_dates, 'main_menu' => $main_menu]);
	}

	function actionSession(int $id)
	{
		$session = Session::load_with_hall_number($id);
		$movie = $session->get_movie();
		$main_menu = main_menu();

		return $this->render("session", "сеанс",
			['movie' => $movie, 'session' => $session, 'main_menu' => $main_menu]);
	}
}