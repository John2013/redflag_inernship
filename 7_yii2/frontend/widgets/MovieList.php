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
<div class='movie col-xs-12 col-sm-3' data-id='{$movie->id}'>
	<div class='movie__title-wrapper'>
		<span class='movie__title'>$movie->title</span>
	</div>
	<div class='movie__poster' style='background-image: url(\"{$movie->getImageFileUrl('poster')}\")'></div>
	<span class='movie__genres'>Триллер Фантастика Приключения Экшн</span>
	<span class='movie__time'>113 мин</span>
</div>";
			$movies .= $movie_text;
		}
		return "<div class='movies row'>$movies</div>";
	}
}