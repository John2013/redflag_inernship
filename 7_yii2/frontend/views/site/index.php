<?php

use yii\bootstrap\Tabs;

/**
 * @var $this yii\web\View
 * @var $moviesNow \backend\models\Movie[]
 * @var $moviesSoon \backend\models\Movie[]
 */

$this->title = 'Кинотеатр - Фильмы';
?>
<?//= \app\widgets\MovieList::widget(['movies' => $movies]) ?>
<div class="row">
	<div class="col-xs-12">
		<?= Tabs::widget([
    'items' => [
	    [
		    'label' => 'В прокате',
		    'content' => \app\widgets\MovieList::widget(['movies' => $moviesNow]),
		    'active' => true
	    ],
	    [
		    'label' => 'Скоро',
		    'content' => \app\widgets\MovieList::widget(['movies' => $moviesSoon]),
	    ],
    ],
]) ?>
	</div>

</div>