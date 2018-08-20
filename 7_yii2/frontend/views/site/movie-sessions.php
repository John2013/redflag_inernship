<?php

/**
 * Created by PhpStorm.
 * User: evgeny
 * Date: 16.08.2018
 * Time: 16:41
 */

/* @var $this \yii\web\View */
/* @var $sessionsByDate \backend\models\Session[][][] */
/* @var $movie \backend\models\Movie */
$this->title = $movie->title . " - сеансы";
$this->params['breadcrumbs'][] =
	['label' => $movie->title, 'url' => ['movie', 'id'=> $movie->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="movie-sessions">
	<div class="movie-sessions__date">
		<? foreach ($sessionsByDate as $date => $sessionsByFormat){
			?>
			<h2 class="movie-sessions__date-title"><?= date('d.m.Y', $date) ?></h2>
			<div class="movie-sessions__formats">
				<?
				foreach ($sessionsByFormat as $format => $sessions){
					?>
					<div class="movie-sessions__format">
						<h3 class="movie-sessions__format-title"><?= $format ?></h3>
						<div class="movie-sessions__sessions">
							<?
							foreach ($sessions as $session){
								?>
								<a href="<?=
								\yii\helpers\Url::to(['site/session', 'id'=> $session->id])
								?>" class="movie-sessions__session">
									<span class="movie-sessions__session-time">
										<?= date('H:i', strtotime($session->time)) ?>
									</span>
									<span class="movie-sessions__session-price"><?= $session->tariff->price ?> ₽</span>
								</a>
								<?
							}
							?>
						</div>
					</div>
					<?
				}
				?>
			</div>
			<?
		} ?>

	</div>
</div>
<?= \common\widgets\Pprint::widget(['data' => $sessionsByDate]) ?>
