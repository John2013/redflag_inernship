<?
require $_SERVER['DOCUMENT_ROOT'].'/vendor/autoload.php';

function days_to_time($time, $cur_time = null){
	if(!$cur_time){
		$cur_time = time();
	}
	$seconds_to_time = $time - $cur_time;
	$seconds_in_year = 86400;
	return (int)ceil($seconds_to_time / $seconds_in_year);
}