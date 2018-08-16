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
use yii\helpers\Html;

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
			$options = "";
			foreach ($movie->options as $option)
				$options .= Html::tag('span', $option, ['class'=>'movie__option']);

			$movie_text = "
<div class='movie col-xs-12 col-sm-3' data-id='{$movie->id}'>
	<div class='movie__title-wrapper'>
		<span class='movie__title'>$movie->title</span>
	</div>
	<div class='movie__poster' style='background-image: url(\"{$movie->getImageFileUrl('poster')}\")'>
		<div class='movie__options'>$options</div>
	</div>
	
	<span class='movie__genres'>" . implode(' ', $movie->genres) . "</span>
	<span class='movie__time'>$movie->duration мин</span>
</div>";
			$movies .= $movie_text;
		}
		return "<div class='movies row'>$movies</div>";
	}
}