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

	private function getFormatsStr(Movie $movie){
		$formats = "";
		foreach ($movie->getFormatList(true) as $format)
			$formats .= Html::tag('span', $format, ['class'=>'movies-item__option']);

		return $formats;
	}

	private function getGenresStr(Movie $movie){
		return implode(' ', $movie->genres);
	}

	/**
	 * @return string
	 */
	public function run(){
		$movies = "";
		foreach ($this->movies as $movie){
			$movie_text = "
<div class='movies-item col-xs-12 col-sm-3' data-id='{$movie->id}'>
	<div class='movies-item__title-wrapper'>
		<span class='movies-item__title'>$movie->title</span>
	</div>
	<div 
		class='movies-item__poster' 
		style='background-image: url(\"{$movie->getThumbFileUrl('poster', 'thumb')}\")'
		>
		<div class='movies-item__options'>{$this->getFormatsStr($movie)}</div>
	</div>
	
	<span class='movies-item__genres'>{$this->getGenresStr($movie)}</span>
	<span class='movies-item__time'>$movie->duration мин</span>
</div>";
			$movies .= $movie_text;
		}
		return "<div class='movies row'>$movies</div>";
	}
}