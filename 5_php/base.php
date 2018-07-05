<?
require $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';

function days_to_time($time, $cur_time = null)
{
	if (!$cur_time) {
		$cur_time = time();
	}
	$seconds_to_time = $time - $cur_time;
	$seconds_in_year = 86400;
	return (int)ceil($seconds_to_time / $seconds_in_year);
}

function counter($array)
{
	$counter = [];
	foreach ($array as $item) {
		if (isset($counter[$item]))
			$counter[$item] += 1;
		else $counter[$item] = 1;
	}
	return $counter;
}

function get_percent_array($counter, $all_count, $numbers_after_dot = 2)
{
	define('ALL_COUNT', $all_count);
	define('NUMBER_AFTER_DOT', $numbers_after_dot);

	return array_map(
		function ($count) {
			return round($count / ALL_COUNT * 100, NUMBER_AFTER_DOT);
		},
		$counter
	);
}