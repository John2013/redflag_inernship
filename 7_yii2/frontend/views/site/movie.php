<?php

/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 16.08.2018
 * Time: 17:05
 */

/* @var $this \yii\web\View */
/* @var $movie \backend\models\Movie */
$this->title = $movie->title;
$this->params['breadcrumbs'][] = $this->title;
?>
<?= \common\widgets\Pprint::widget(['data' => $movie]) ?>