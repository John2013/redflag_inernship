<?php

/**
 * @var $this yii\web\View
 * @var $movies \backend\models\Movie[]
 */

$this->title = 'Кинотеатр - Главная';
?>
<?= \app\widgets\MovieList::widget(['movies' => $movies]) ?>
