<?php

/* @var $this yii\web\View */
/* @var $model common\models\User */

$this->title = 'Изменить профиль';
$this->params['breadcrumbs'][] = ['label' => 'Профиль', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-update">

	<?= $this->render('_form', [
		'model' => $model,
	]) ?>

</div>
