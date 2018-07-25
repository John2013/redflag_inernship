<?
/**
 * @var Movie $movie
 * @var Session $session
 */
?><div class="session">
	<h2 class="sessions__movie_name"><?= $movie->name ?> - сеанс</h2>

	<table>
		<tr>
			<th>Фильм</th><td><?= $movie->name ?></td>
		</tr>
		<tr>
			<th>Дата</th><td><?= date('d.m.Y', $session->time) ?></td>
		</tr>
		<tr>
			<th>Время</th><td><?= date('H:i', $session->time) ?></td>
		</tr>
		<tr>
			<th>Зал</th><td><?= $session->_hall_number ?></td>
		</tr>
	</table>
</div>