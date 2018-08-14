<?php

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
		<?= \common\widgets\Pprint::widget(['data' => $moviesNow]) ?>
		<?= \common\widgets\Pprint::widget(['data' => $moviesSoon]) ?>
	</div>

</div>