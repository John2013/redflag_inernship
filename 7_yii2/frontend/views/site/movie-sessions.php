<?php

/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 16.08.2018
 * Time: 16:41
 */

/* @var $this \yii\web\View */
/* @var $sessions \backend\models\Session[] */
$this->title = $sessions[0]->movie->title . " - сеансы";
$this->params['breadcrumbs'][] =
	['label' => $sessions[0]->movie->title, 'url' => ['movie', 'id'=> $sessions[0]-> movie_id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<?= \common\widgets\Pprint::widget(['data' => $sessions]) ?>
