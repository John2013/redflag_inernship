<?php

/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 16.08.2018
 * Time: 16:30
 */

/* @var $this \yii\web\View */
/* @var $sessionsToday \backend\models\Session[movie_id][format_name][] */
/* @var $sessionsTomorrow \backend\models\Session[movie_id][format_name][] */
/* @var $sessionsAfter \backend\models\Session[date][movie_id][format_name][] */
$this->title = "Сеансы";
$this->params['breadcrumbs'][] = $this->title;
?>
<?//= \common\widgets\Pprint::widget(['data' => $sessionsSorted]) ?>
<?= \yii\bootstrap\Tabs::widget(['items' => [
	[
		'label'=>'Сегодня',
		'active'=>true,
		'content' => \app\widgets\SessionsList::widget(['sessions' => $sessionsToday])
	],
	[
		'label'=>'Завтра',
		'content' => \app\widgets\SessionsList::widget(['sessions' => $sessionsTomorrow])
	],
	[
		'label'=>'Потом',
		'content' => \app\widgets\SessionsList::widget(['sessions' => $sessionsAfter])
	],
]]) ?>