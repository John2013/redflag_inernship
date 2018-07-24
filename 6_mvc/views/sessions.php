<?
/**
 * @var Movie $movie
 * @var Session[][] $sessions_dates
 */
?><div class="sessions">
	<h2 class="sessions__movie_name"><?= $movie->name ?> - сеансы</h2>

	<? foreach ($sessions_dates as $date => $sessions){
		?><p class="sessions__date"><?= date('d.m.Y', $date) ?></p>
		<p class="sessions__sessions">
			<? foreach ($sessions as $session){
				?><a href="/6_mvc/session.php?id=<?= $session->id ?>" class="sessions__session">
				<?= date('i:s', $session->time) ?>
			</a> <?
		} ?>
		</p><?
	} ?>

</div>