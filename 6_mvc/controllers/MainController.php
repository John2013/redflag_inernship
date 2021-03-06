<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 23.07.2018
 * Time: 13:01
 */

class MainController extends BaseController
{
	public $layout = 'main';

	function actionIndex(){
		$movies = Movie::load();
		$main_menu = main_menu();
		return $this->render("movie_list", "список фильмов",
			['movies' => $movies, 'main_menu' => $main_menu]);
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