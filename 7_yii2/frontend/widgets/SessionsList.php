<?php

/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 10.08.2018
 * Time: 11:16
 *
 * @noinspection CssUnknownTarget
 */

namespace app\widgets;


use backend\models\Movie;
use backend\models\Session;
use yii\base\Widget;
use yii\helpers\Url;

/**
 * Class MovieList
 * @package app\widgets
 */
class SessionsList extends Widget
{
	public $sessions = [];

	/**
	 * @param $sessions Session[]
	 * @return string
	 */
	private function getSessions($sessions)
	{
		$result = "";

		foreach ($sessions as $session) {
			$time = date('H:i', strtotime($session->time));
			$url = Url::to(['site/session', 'id' => $session->id]);
			$result .= "
<a href='$url' class='sessions__item'>
	<span class='sessions__item-title'>$time</span>
	<span class='sessions__item-price'>{$session->tariff->price} ₽</span>
</a>";
		}

		return $result;
	}

	/**
	 * @param $sessionsByFormats Session[format_name][]
	 * @return string
	 */
	private function getFormats($sessionsByFormats)
	{
		$result = "";
		foreach ($sessionsByFormats as $format => $sessions) {
			$sessions = $this->getSessions($sessions);
			$result .= "
<div class='sessions__format'>
	<span class='sessions__format-title'>$format</span>
	<div class='sessions__items'>
		$sessions
	</div>
</div>";
		}

		return $result;
	}

	/**
	 * @param $sessionsByMovies Session[movie_id][format_name][]
	 * @return string
	 */
	private function getMovies($sessionsByMovies)
	{
		$result = "";

		foreach ($sessionsByMovies as $movie_id => $sessionsByFormats) {
			$movie = Movie::findOne($movie_id);
			$formats = $this->getFormats($sessionsByFormats);
			$result .= "
<div class='sessions__movie'>
	<h3 class='sessions__movie-title'>$movie->title</h3>
	<div class='sessions__movie-formats'>
		$formats
	</div>
</div>";
		}

		return $result;
	}

	private function getDates()
	{
		$result = "";
		if (count($this->sessions) > 1) {
			foreach ($this->sessions as $date => $sessionsByMovies) {
				$movies = $this->getMovies($sessionsByMovies);
				$result .= "
<div class='sessions__date'>
	<h2 class='sessions__date-title'>" . date('d.m.Y', $date) . "</h2>
	<div class='sessions__date-values'>
		$movies
	</div>
</div>";
			}
		} else {
			$result .= $this->getMovies(reset($this->sessions));
		}

		return $result;
	}

	/**
	 * @return string
	 */
	public function run()
	{
		$dates = !empty($this->sessions) ? $this->getDates() : "Нет сеансов";

		$result = "
<div class='sessions'>
	$dates
</div>";
		return $result;
	}
}