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

			$may = 5;
			$mays_days_count = 31;

			$may_last_day = mktime(0, 0, 0, $may, $mays_days_count, date("Y"));
			if ($may_last_day < $current_date)
				$may_last_day = mktime(0, 0, 0, $may, $mays_days_count, date("Y") + 1);

			$day = 86400;

			while (getdate($may_last_day)['wday'] !== 0)
				$may_last_day -= $day;

			return days_to_time($may_last_day);
		}

		?>
		<p><?= days_to_maslennitsa() ?></p>
	</li>
	<li>
		<p>Дан инпут и кнопка. В этот инпут вводится дата рождения в формате '31.12'. По нажатию на кнопку выведите знак
			зодиака пользователя.</p>
		<?
		$birth_date_str = htmlspecialchars($_REQUEST['date7']) ?: date('d.m');
		?>
		<form action="#date7" method="post">
			<label for="date7">дата рождения в формате '31.12'</label>
			<input type="text" id="date7" name="date7" value="<?= $birth_date_str ?>">
			<input type="submit">
		</form>
		<?
		function get_zodiacal_sign($day, $month)
		{
			$signs = ["Козерог", "Водолей", "Рыбы", "Овен", "Телец", "Близнецы", "Рак", "Лев", "Девы", "Весы",
				"Скорпион", "Стрелец"];
			$signs_start = [1 => 21, 2 => 20, 3 => 20, 4 => 20, 5 => 20, 6 => 20, 7 => 21, 8 => 22, 9 => 23, 10 => 23,
				11 => 23, 12 => 23];
			return $day < $signs_start[$month + 1] ? $signs[$month - 1] : $signs[$month % 12];
		}

		$birth_day = (int)substr($birth_date_str, 0, 2);
		$birth_month = (int)substr($birth_date_str, 3, 2);
		?>
		<p><?= get_zodiacal_sign($birth_day, $birth_month) ?></p>
	</li>
	<li>
		<p>Дан массив праздников. По заходу на страницу, если сегодня праздник, то поздравьте пользователя с этим
			праздником.</p>
		<?

		$holidays = [
			["day" => 1, 'month' => 1, 'name' => 'Новый год'],
			["day" => 7, 'month' => 1, 'name' => 'Рождество Христово'],
			["day" => 14, 'month' => 1, 'name' => 'Старый Новый год '],

			["day" => 8, 'month' => 2, 'name' => 'День бармена'],
			["day" => 14, 'month' => 2, 'name' => 'День Святого Валентина (День всех влюбленных)'],

			["day" => 8, 'month' => 3, 'name' => 'Международный женский день'],

			["day" => 1, 'month' => 4, 'name' => 'День смеха'],
			["day" => 4, 'month' => 4, 'name' => 'Пасха'],

			["day" => 1, 'month' => 5, 'name' => 'Праздник труда'],
			["day" => 9, 'month' => 5, 'name' => 'День воинской славы России — День Победы советского народа в Великой '
				. 'Отечественной войне 1941—1945 годов (1945) '],

			["day" => 1, 'month' => 6, 'name' => 'Международный день защиты детей'],
			["day" => 12, 'month' => 6, 'name' => 'День независимости России'],
			["day" => 22, 'month' => 6, 'name' => 'День памяти и скорби (начало ВОВ)'],

			["day" => 7, 'month' => 7, 'name' => 'Иван Купала'],
			["day" => 30, 'month' => 7, 'name' => 'День системного администратора'],

			["day" => 2, 'month' => 8, 'name' => 'День воздушно-десантных войск (День ВДВ) '],

			["day" => 1, 'month' => 9, 'name' => 'День знаний'],

			["day" => 4, 'month' => 10, 'name' => 'День Космических войск, День гражданской обороны МЧС России'],

			["day" => 6, 'month' => 11, 'name' => 'Всемирный день мужчин'],

			["day" => 12, 'month' => 12, 'name' => 'День Конституции Российской Федерации'],
		];

		define('CUR_DATE', getdate());
		//		define('CUR_DATE', getdate(mktime(0,0,0,1,1,2018)));

		$current_holiday_array = array_filter($holidays, function ($item) {
			return $item['day'] == CUR_DATE['mday'] && $item['month'] == CUR_DATE['mon'];
		})[0];
		$current_holiday = $current_holiday_array ? $current_holiday_array['name'] : "Сегодня нет праздника"
		?>
		<p><?= $current_holiday ?></p>
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