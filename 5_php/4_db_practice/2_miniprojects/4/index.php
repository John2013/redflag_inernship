<?
require "../../../base.php";
require "OrganizersDay.php";

use Jenssegers\Date\Date;

if(isset($_REQUEST['update'])){
	$update_array = array_map("map_htmlspecialchars", $_REQUEST['update']);
	$updating_day = new OrganizersDay($update_array['wday'], $update_array['tasks']);
	$updating_day->save();

}

Date::setLocale('ru');
$days = OrganizersDay::load();

$current_wday = isset($_REQUEST['wday']) ? (int)$_REQUEST['wday'] : (int)date('N') - 1;

?><!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>Органайзер</title>
	<link rel="stylesheet" href="../bootstrap.css">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<div id="wrapper">
	<h1>Органайзер</h1>
	<div>
		<nav>
			<ul class="pagination">
				<? foreach ($days as $day) {
					$active = $current_wday == $day->wday ? " class=\"active\"" : "";
					?>
					<li<?= $active ?>><a href="?wday=<?= $day->wday ?>"><?= $day->get_weeks_day_name() ?></a></li>
					<?
				} ?>
			</ul>
		</nav>
		<p class="date"><span>Сегодня:</span> <?= Date('d F Y года') ?></p>
	</div>
	<div id="form">
		<form action="#form" method="POST">
			<input type="hidden" name="update[wday]" value="<?= $current_wday ?>">
			<p>
				<textarea class="form-control" name="update[tasks]" placeholder="Ваш отзыв"><?= $days[$current_wday] ?></textarea>
			</p>
			<p><input type="submit" class="btn btn-info btn-block" value="Сохранить"></p>
		</form>
	</div>
</div>

</body>
</html>