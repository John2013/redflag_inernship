<?
require '../../base.php';

use Michelf\MarkdownExtra;

setlocale(LC_ALL, 'ru_RU.UTF-8');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<?
echo MarkdownExtra::defaultTransform(file_get_contents('./README.md'));
?>
<h3>Решение</h3>
<ol>
	<li>
		<p>По заходу на страницу выведите сколько дней осталось до нового года.</p>
		<?
		$current_date = getdate();
		$new_year_date = mktime(0, 0, 0, 1, 1, $current_date['year'] + 1);
		?>
		<p><?= days_to_time($new_year_date) ?></p>
	</li>
	<li>
		<p>Дан инпут и кнопка. В этот инпут вводится год. По нажатию на кнопку выведите на экран, високосный он или
			нет.</p>
		<?
		function is_leap_year($year)
		{
			return ((!($year % 4) && ($year % 100)) || (!($year % 400)));
		}


		$year = (int)(htmlspecialchars($_REQUEST['year']) ?: date('Y'));
		?>
		<form method="post" action="#year">
			<label for="year">Год</label>
			<input type="number" id="year" min="1" max="9999" name="year" value="<?= $year ?>">
			<input type="submit">
		</form>
		<p><?= is_leap_year($year) ? '' : 'не ' ?>високосный</p>
	</li>
	<li>
		<p>Дан инпут и кнопка. В этот инпут вводится дата в формате '01.12.1990'. По нажатию на кнопку выведите на экран
			день недели, соответствующий этой дате, например, 'воскресенье'.</p>
		<?
		function weeks_day_to_string($int_day)
		{
			switch ($int_day) {
				case 0:
					return 'воскресенье';
				case 1:
					return 'понедельник';
				case 2:
					return 'вторник';
				case 3:
					return 'среда';
				case 4:
					return 'четверг';
				case 5:
					return 'пятница';
				case 6:
					return 'суббота';
				default:
					return false;
			}
		}

		$date_str = htmlspecialchars($_REQUEST['date']) ?: date('Y-m-d');
		$date_int = strtotime($date_str);
		$weeks_day = getdate($date_int)['wday'];
		$str_weeks_day = weeks_day_to_string($weeks_day);
		?>
		<form action="#date" method="post">
			<label for="date">Дата</label>
			<input type="date" name="date" id="date" value="<?= $date_str ?>">
			<input type="submit">
		</form>
		<p><?= $str_weeks_day ?></p>
	</li>
	<li>
		<p>По заходу на страницу выведите текущую дату в формате '12 мая 2015 года, воскресенье'.</p>
		<p><?= date('d F Y года, l') ?></p>
	</li>
	<li>
		<p>Дан инпут и кнопка. В этот инпут вводится дата рождения в формате '01.12.1990'. По нажатию на кнопку выведите
			на экран сколько дней осталось до дня рождения пользователя.</p>
		<?
		$date_str = htmlspecialchars($_REQUEST['birth_year']) ?: date('Y-m-d');
		$date_int = strtotime($date_str);
		?>
		<form action="#birth_year" method="post">
			<label for="birth_year">Дата рождения</label>
			<input type="date" name="birth_year" id="birth_year" max="<?= date('Y-m-d') ?>" value="<?= $date_str ?>">
			<input type="submit">
		</form>
		<?
		$birth_date = getdate($date_int);
		$next_birthday = mktime(
			null,
			null,
			null,
			$birth_date["mon"],
			$birth_date["mday"],
			(int)date('Y')
		);
		if ($next_birthday < time()) {
			$next_birthday = mktime(
				null,
				null,
				null,
				$birth_date["mon"],
				$birth_date["mday"],
				(int)date('Y') + 1
			);
		}
		?>
		<p><?= days_to_time($next_birthday) ?></p>
	</li>
	<li>
		<p>По заходу на страницу выведите сколько дней осталось до ближайшей масленницы (последнее воскресенье
			весны).</p>
		<?
		function days_to_maslennitsa($current_date = null)
		{
			if (!$current_date)
				$current_date = time();

			$may_last_day = mktime(0, 0, 0, 5, 31, date("Y"));
			if ($may_last_day < $current_date)
				$may_last_day = mktime(0, 0, 0, 5, 31, date("Y") + 1);

			while (getdate($may_last_day)['wday'] !== 0)
				$may_last_day -= 86400;

			return days_to_time($may_last_day);
		}

		?>
		<p><?= days_to_maslennitsa() ?></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
	<li>
		<p></p>
		<p></p>
	</li>
</ol>
</body>
</html>