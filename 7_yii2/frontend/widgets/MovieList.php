<?php
/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 10.08.2018
 * Time: 11:16
 */

namespace app\widgets;


use backend\models\Movie;
use yii\base\Widget;

/**
 * Class MovieList
 * @package app\widgets
 */
class MovieList extends Widget
{
	/**
	 * @var Movie[] $movies
	 */
	public $movies;

	/**
	 * @return string
	 */
	public function run(){
		$movies = "";
		foreach ($this->movies as $movie){
			$movie_text = "
<div class='movie'>
	<span class='movie__title'>$movie->title</span>
	<img class='movie__poster' alt='' src='{$movie->getThumbFileUrl('poster','thumb')}'>
	<span class='movie__genres'>
		Триллер Фантастика Приключения Экшн<br>
		113 мин
	</span>
</div>";
			$movies .= $movie_text;
		}
		return "<div class='movies'>$movies</div>";
	}
}