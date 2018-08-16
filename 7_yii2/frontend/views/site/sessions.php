<?php

/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 16.08.2018
 * Time: 16:30
 */

/* @var $this \yii\web\View */
/* @var $sessions \backend\models\Session[] */
$this->title = "Сеансы";
$this->params['breadcrumbs'][] = $this->title;
?>
<?= \common\widgets\Pprint::widget(['data' => $sessions]) ?>
сессии
